class Slider {

    _started = false;
    config = {};

    constructor(config){
        
        this.config = config;
        const { slides, duration } = this.config // config data
        this._start();

    }

    _start = () => {
        this._started = true;
        /**
         * slider setting properties
         */
        let current = 1;
        let slides = this.config.slides;
        let duration = this.config
            .duration;
        let images = document.querySelectorAll(slides) ?? ([]);

        if((images.length == 0) ==1)
            return;

        /**
         * display first slide image
         */
        images[0].style.zIndex = 1;
        images[0].style.opacity = 1;

        setInterval(() => {
            current = current < images.length ? 
            current + 1 : 1;

            document.querySelectorAll(slides).forEach( (e) => {
                e.style.opacity = 0;
            });

            images[current - 1]
                . style.opacity = 1;

            ///////////////////////////////////////////////////
            
        }, duration)
    }

}