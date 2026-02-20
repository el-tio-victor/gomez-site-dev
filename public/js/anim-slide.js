/** Animacion ******************/
        var elements_toggle = document.querySelectorAll('.elements_toggle');
        var btn_view_detail_work = document.querySelectorAll('.btn-view-detail');
        const paths = [
                'M0,0c-2.4978658763999992,-1.0012454141999996,-0.4978654334999959,47.998755345000006,-1,104s-0.33790761060001273,35.53244692070001,-1,78s3.525728462500002,45.514338366900006,0,120s-35.3624983828,-359.7266654234,2,-302Z',
                'M0,0c-5.497865876399999,-1.0012454141999996,78.5021345665,48.998755345000006,42,89s39.66209238939999,67.53244692070001,0,105s12.525728462499998,70.5143383669,-42,108s-40.3624983828,-359.7266654234,0,-302Z',
                "M 593.37146,4.3763551 558.2332,28.570993 C 451.39148,102.13744 575.87868,159.77247 536.88557,204.47569 452.20304,301.55902 570.86722,345.8947 598.70838,444.37365 616.70936,508.0462 639.07087,-70.123462 593.37146,4.3763551 Z",
                "m 593.37146,4.3763551 6.79463,75.2765099 c 2.24106,24.828255 -0.76242,122.535575 -0.76242,122.535575 2.23289,23.12898 -9.47606,149.04317 -0.69529,162.13153 36.86377,54.94808 35.02558,-417.67028 -5.33692,-359.9436149 z"
            ];
        //let way = 'right';
        



        function slide(element,way){
            
            /*let cont_anim = element.querySelector('.container-anim')
            console.log('element',cont_anim);
            cont_anim.classList.toggle('hide');*/
            let svg = element.querySelector('.svg');
            let svg_left = element.querySelector('.svg-left');
            
            let snap = Snap(svg);
            var snap_left = Snap(svg_left);
            let path = snap.path(paths[0]);
            let path_left = snap_left.path(paths[3]);

            path.attr({
                fill: '#fff'
            });
            path_left.attr({
                fill: '#fff'
            });
            
            let el_slide = element.querySelector('.slide')
            console.log(el_slide);
            if(way == 'right')
                el_slide.classList.add('mov-0')
            else {
                el_slide.classList.remove('mov-right');
                //el_slide.classList.add('mov-left');
            }
            let path_ob = way == 'right' ? path : path_left;
            let str_path = setStrPath('right',way); 
            pathAnimate(
                path_ob, str_path[0], str_path[1], 450,250
            );
                setTimeout(() => {
                
                let path_ob = way == 'right' ? path_left : path;
                let str_path = setStrPath('left',way); 
                console.log(str_path);
                    pathAnimate(
                    path_ob,str_path[0],str_path[1],450,300
                    );
                if(way == 'right'){
                    el_slide.classList.add('mov-right');
                    //way = 'left';
                }
                else{
                    el_slide.classList.remove('mov-0');
                    //way = 'right';
                }
                
                }, 900);
        }

        function setStrPath( side_path,way){
            console.log(way);
            let result = [];
            if((way === 'right' && side_path == 'right') ||
             (way === 'left' && side_path === 'left')){
                result = [1,0];
            }
            else{
                result = [2,3]
            }
            return result;
        }

        function pathAnimate(
        path_object,
        path_string_1,
        path_string_2,
        duration_1,
        duration_2
        ){
        path_object.animate({
                d: paths[path_string_1]
            }, duration_1, mina.linear, () => {
                path_object.animate({
                    d: paths[path_string_2]
                }, duration_2 , mina.linear);
            });
        }

        function showDetailWork(){
            console.log(this);


            console.log(this.parentNode);
            
            let way = this.dataset.way;
            console.log(way);
            let el = this.parentNode;
            while (!el.classList.contains('work-wrapper')) {
                    el = el.parentNode;
                }
            
            let cont_anim = el.querySelector('.container-anim')

           if( cont_anim.classList.contains('over')){
            this.classList.toggle('close')
            cont_anim.classList.toggle('over');
 

            slide(el,way);

            setTimeout(() => {
                let els_toggle = el.querySelectorAll('.elements-toggle');
                for (let index = 0; index < els_toggle.length; index++) {
                    els_toggle[index].classList.toggle('hide');  
                }
                console.log('toggle',el.querySelectorAll('.elements-toggle'));
                this.dataset.way = way == 'right'? 'left' : 'right';
                hideContainerAnim(el);
            }, 1000);
           } 
        }

        function hideContainerAnim(element){
            setTimeout(() => {
                let cont_anim = element.querySelector('.container-anim')
                cont_anim.classList.toggle('over');
            }, 1000);
        }
        /** ****************************/
