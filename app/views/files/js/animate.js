            var scene = new THREE.Scene();
            var controls;
            var camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 0.1, 1000 );
            var renderer = new THREE.WebGLRenderer();
            renderer.setSize( window.innerWidth, window.innerHeight );
            document.body.appendChild( renderer.domElement );
            
            var geometry = new THREE.SphereGeometry( 3, 0, 0 );
            var material = new THREE.MeshNormalMaterial ( {wireframe: true} );
            var sphere = new THREE.Mesh( geometry, material );
            scene.add( sphere );
            
            camera.position.z = 15;
            controls  = new THREE.OrbitControls(camera,render.domElement);
            
            function render() {
                
                controls.update();
                requestAnimationFrame( render );
                sphere.rotation.x += .01;
                sphere.rotation.y += .01;
                renderer.render( scene, camera );
            }
            render();
            
            window.addEventListener('resize', function() {
              var WIDTH = window.innerWidth,
                  HEIGHT = window.innerHeight;
              renderer.setSize(WIDTH, HEIGHT);
              camera.aspect = WIDTH / HEIGHT;
              camera.updateProjectionMatrix();
            });

