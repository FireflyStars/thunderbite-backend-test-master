
    <script>

;( function ( document, window, index )
            {
                // feature detection for drag&drop upload
                let isAdvancedUpload = function()
                    { 
                        let div = document.createElement( 'div' );
                        return ( ( 'draggable' in div ) || ( 'ondragstart' in div && 'ondrop' in div ) ) && 'FormData' in window && 'FileReader' in window;
                    }();


                // applying the effect for every form
                let forms = document.querySelectorAll( '.imageupload' );
                let formcontrol = document.getElementById('formupload');

                
                Array.prototype.forEach.call( forms, function( form )
                {
                    let input		 = form.querySelector( 'input[type="file"]' ),
                        label		 = form.querySelector( 'label' ),
                        errorMsg	 = form.querySelector( '.imageupload__error span' ),
                        restart		 = form.querySelectorAll( '.imageupload__restart' ),
                        droppedFiles = false,
                        showFiles	 = ( files, ele ) =>
                        {   
                            let parent = ele;  console.log(parent)
                            let input = $(parent).find('input');
                            label.textContent = files[ 0 ].name;
                            let img = document.createElement('img');
                            img.onload = function () {
                                window.URL.revokeObjectURL(this.src);
                            };
                            img.src = window.URL.createObjectURL(files[0]);
                            $(parent).append(img)
                            input.prop('files', files)

                        };

            

                    // drag&drop files if the feature is available
                    if( isAdvancedUpload )
                    { 
                        form.classList.add( 'has-advanced-upload' ); // letting the CSS part to know drag&drop is supported by the browser

                        [ 'drag', 'dragstart', 'dragend', 'dragover', 'dragenter', 'dragleave', 'drop' ].forEach( function( event )
                        {
                            form.addEventListener( event, function( e )
                            {
                                // preventing the unwanted behaviours
                                e.preventDefault();
                                e.stopPropagation();
                            });
                        });
                        [ 'dragover', 'dragenter' ].forEach( function( event )
                        {
                            form.addEventListener( event, function()
                            {
                                form.classList.add( 'is-dragover' );
                            });
                        });
                        [ 'dragleave', 'dragend', 'drop' ].forEach( function( event )
                        {
                            form.addEventListener( event, function()
                            {
                                form.classList.remove( 'is-dragover' );
                            });
                        });
                        form.addEventListener( 'drop', function( e )
                        { 
                            console.log(this)
                            droppedFiles = e.dataTransfer.files; // the files that were dropped
                            showFiles( droppedFiles, this );

                        });
                    }


                    // restart the form if has a state of error/success
                    Array.prototype.forEach.call( restart, function( entry )
                    {
                        entry.addEventListener( 'click', function( e )
                        {
                            e.preventDefault();
                            form.classList.remove( 'is-error', 'is-success' );
                            input.click();
                        });
                    });

                    // Firefox focus bug fix for file input
                    input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
                    input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });

                });
            }( document, window, 0 ));
        
      
    
    </script>
