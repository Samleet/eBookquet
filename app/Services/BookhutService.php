<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Bookhut;
use App\Models\Group;
use App\Models\User;
use App\Models\Chat;
use App\Exceptions\ApplicationException;
use App\Enums\Error;
use App\Enums\Access;
use App\Enums\Message;

class BookhutService {

    public function __construct(){
        //

    }

    public function index($request){
        //

    }

    public function show($request){
        $bookhut = Bookhut::findOrFail($request->id ?? null)->load('books');
        $garbage = [];

        $members = [];
        foreach($bookhut->members()
                ->orderBy('id', 'ASC')->get() as $member){
            /*
            if($bookhut->owner()->id==user()->id) continue;
            */

            $user = User::find(
                $member->user_id
            );
            $user->approved = $member->approved 
            == 1 ? true : false;

            /*
            $collection = 0;
            foreach($user->library as $library){
                $book = Book::find(
                    $library->book_id
                );
                $collection += $book->bookhut_id == $bookhut->id ? 1 : 0  ;
            }
            */

            $user->collection = count($bookhut->collection(
                $user
            ));

            $members[] = $user;
        }

        $huttalk = [];
        foreach($bookhut->spaces()->get() as $space){
            /*
            $participant = json_decode($space->members,1);
            $hut_users = [];
            
            foreach($participant as $data ){
                $key = array_keys($participant, $data)[0]; //load user keys
                $user = User::find($data['user']);
                if(!$user) {
                    array_splice($participant , $key, 1 ); //remove element
                    continue;
                }

                $participant[
                    $key
                ]['user'] = ( $user->toArray( ) );
            }
            */
            $space->members = $space->members();
            $huttalk[] = $space;
        }
        
        $sort = usort($huttalk, function($a, $b) {

            return in_array($b['status'], ['started', 'pending']) == true;

        });

        $bookhut = array_merge($bookhut->toArray( ), array(
            'space' => $huttalk,
            'members' => $members
        ));

        return [
            'data' => $bookhut
        ];
    }

    public function join($request){
        $bookhut = Bookhut::findOrFail($request->id ?? null)->load('books');

        //check if already a member
        if($bookhut->member(user()->id)){
            throw new ApplicationException(
                'You\'re already a member of: '.$bookhut->name
            );
        }

        //check for grant permsision
        if($request->code == null)
        if($bookhut->access == Access::PRIVATE){
            return [
                'status' => '200',
                'message' => 'Authorization required  for: '.$bookhut->name,
                'data' => [
                    'status' => 'pending'
                ]
            ];
        }

        if($request->code != null)
        if($request->code != $bookhut->access_pin){
            throw new ApplicationException(
                'Authorization code is invalid!, try again.  '
            );
        }

        $bookhut->members()->create([
            'user_id' => user()->id,
            'bookquet_id' => $bookhut->bookquet_id,
            'approved' => 1
        ]);

        return [
            'status' => '200',
            'message' => 'You\'ve successfully joined the: '.$bookhut->name,
            'data' => [
                'status' => 'success',
                'bookhut' => $bookhut
            ]
        ];
    }

    public function request($request){
        $bookhut = Bookhut::findOrFail($request->id ?? null)->load('members');

        //check if already a member
        if($bookhut->member(user()->id)){
            throw new ApplicationException(
                'You\'re already a member of: '.$bookhut->name
            );
        }

        //check if request to join
        $hasJoin = $bookhut->members->where('user_id', user()->id)->first( );
        /*
        $request = array_map(function($a){
            $user = user();
            return $a['user_id'] == $user->id && $a['approved'] === (  0  ) ;

        }, $members->toArray());
        */

        if($hasJoin){
            throw new ApplicationException(
                'You\'ve already requested to join this Bookhut'
            );
        }

        $bookhut->members()->create([
            'user_id' => user()->id,
            'bookquet_id' => $bookhut->bookquet_id,
            'approved' => $bookhut->access==Access::PRIVATE ? 0 : 1
        ]);

        //notify the bookhut owner
        $owner = $bookhut->owner();
        $owner->notifications()->create([
            'message' => Message::build(Message::BOOKHUT_REQUEST, [
                'user' => user()->fullname,
                'bookhut' => $bookhut->name
            ])
        ]);

        return [
            'status' => '200',
            'message' => 'You\'ve requested to joined hut: '.$bookhut->name,
            'data' => [
                'status' => 'success',
                'bookhut' => $bookhut
            ]
        ];
    }

    public function top($request){
        $limit = limit(@$request->limit);
        $bookhuts = Bookhut::join(
            'groups', 'groups.bookhut_id', '=', 'bookhuts.id'      //piping
        )
        ->select('bookhuts.*')
        ->withCount('members')
        ->groupBy('bookhuts.id')
        ->orderBy('members_count', 'DESC')
        ->take($limit)
        ->get();

        return [
            'data' => $bookhuts
        ];
    }

    public function member($request){
        /*
        $bookhut = Bookhut::findOrFail($request->id ?? null)->load('books');

        //check if belongs to bookhut
        if(!$bookhut){
            throw new ApplicationException(
                'You are not a member / belong to this Bookhut'
            );
        }

        //check if click user belongs
        $member = $bookhut->members->where('user_id', $request->user)->first();
        if(!$member){
            throw new ApplicationException(
                'No match / user found belonging to this Bookhut'
            );
        }
        */

        $bookhut = Bookhut::find($request->id);
        $member = User::find($request->user);
        
        $member->collection = $bookhut->collection(
            $member
        );

        return [
            'data' => $member
        ];
    }

    public function manage($request){
        $bookhut = Bookhut::findOrFail($request->id ?? null)->load('members');
        $action = substr(
            $request->action, 0, 3);
        
        if($bookhut->owner()->id!=user()->id){
            throw new ApplicationException(
                'You are not the owner of this Bookhut'
            );
        };

        $member = $bookhut->members->where('user_id',$request->user)->first();
        if(!$member){
            return;
        }
            
        if($action == 'app'){
            $member->update([
                'approved' => 1
            ]);

            $member->user->notifications()->create([
                'message' => Message::build(Message::BOOKHUT_APPROVE, array(
                    'user' => $member->user->fullname,
                    'bookhut' => $bookhut->name
                ))
            ]);
        }

        if($action == 'una'){
            $member->update([
                'approved' => 0
            ]);

            $member->user->notifications()->create([
                'message' => Message::build(Message::BOOKHUT_DECLINE, array(
                    'user' => $member->user->fullname,
                    'bookhut' => $bookhut->name
                ))
            ]);
        }

        if($action == 'del'){            
            $shelf = array_map(function($book) use($bookhut, $member){
                $user = $member->user;
                $library = $get = $bookhut->books()->find($book['book_id']);

                if($library){
                    $user->library->find(
                        $book['id']
                    )->delete();
                }
                
            }, $member->user->library->toArray());
            $member->delete();
        }

        return [
            'data' => $bookhut
        ];
    }

    public function trending($request){
        $limit = limit(@$request->limit);
        $bookhuts = Bookhut::inRandomOrder()->take($limit)->get();

        return [
            'data' => $bookhuts
        ];
    }

    public function space($request){
        $bookhut = Bookhut::findOrFail($request->id ?? null)->load('spaces');
        $space = $bookhut->spaces()->findOrFail($request->spaceId);
        $space->members = $space->members();

        return [
            'data' => $space->load('bookhut')
        ];
    }
    
    public function comments($request){
        $bookhut = Bookhut::findOrFail($request->id)->load('comments');
        $comments = [];

        foreach($bookhut->comments as $comment){
            $user = User::find($comment->user_id);
            $reply = null;

            if($comment->reply_to){
                $reply = $reference = Chat::find($comment->reply_to);
                if($reply){
                    $user = User::find(
                        $reply->user_id
                    );
                    $reply->user = 
                    $user->id == user()->id ? 'Me' : $user->fullname;

                    $reply->message = substr($reply->message, 0, 60)   .
                    (true && strlen($reply->message)>60? '...' : '')   ;
                }
            }

            if(!$user) continue;

            $comments[] = [
                'id' => $comment->id,
                'user' => [
                    'id' => $user->id,
                    'name' => $user->fullname
                ],
                'message' => $comment->message,
                'date' => $comment->created_at,
                'highlight' => $comment->highlight,  // significant tags
                'reply' => $reply ?? null
            ];
        }

        return [
            'data' => $comments
        ];
    }

    public function postComment($request){
        $bookhut = Bookhut::findOrFail($request->id)->load('comments');

        $comment = $bookhut->comments()->create([
            'user_id' => user()->id,
            'bookhut_id' => $bookhut->id,
            'message' => $request->message,
            'reply_to' => $request->reply
        ]);

        return [
            'message' => 'You have succesfully posted a new comment. ',
            'data' => $comment
        ];
        
        ////////////////////////////////////////////////////////////////
    }
}