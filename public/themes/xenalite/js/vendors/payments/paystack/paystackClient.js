function payWithPaystack(i,o){PaystackPop.setup({key:"pk_test_e35c7dc133f3b6647e1a6bec7b796364f429a92a",email:i.email,amount:i.amount,currency:i.currency,ref:i.reference,plan:i.plan,metadata:{},callback:o,onClose:function(a){$(".sleek-cover * div.loader").fadeOut("slow")}}).openIframe()}