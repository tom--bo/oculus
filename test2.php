<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>vr.js</title>
        <script src="three.js"></script>
        <script src="OculusRiftEffect.js"></script>
        <script>
            (function (w, d, THREE) {
                w.addEventListener('load', function () {

                    var WORLD_FACTOR = 1.0;

                    var OculusRift = {
                      hResolution: 1280,
                      vResolution: 800,
                      hScreenSize: 0.14976,
                      vScreenSize: 0.0936,
                      interpupillaryDistance: 0.064,
                      lensSeparationDistance: 0.064,
                      eyeToScreenDistance: 0.041,
                      distortionK: [1.0, 0.22, 0.24, 0.0],
                      chromaAbParameter: [0.996, -0.004, 1.014, 0.0]
                    };

                    var camera, effect, renderer, scene,
                        width = 1280,
                        height = 800,
                        aspect = width / height;

                    renderer = new THREE.WebGLRenderer();
                    renderer.setClearColor(0xffffff);
                    renderer.setSize(width, height);

                    effect = new THREE.OculusRiftEffect(renderer, {
                        HMD: OculusRift, worldFactor: WORLD_FACTOR
                    });

                    camera = new THREE.PerspectiveCamera(90, aspect, 0.1, 1000);
                    camera.position.set(0, 200, 900);

                    scene = new THREE.Scene();

                    var cube, cubeGeometry, cubeMaterial;

                    cubeGeometry = new THREE.CubeGeometry(500, 500, 500, 10, 10, 10);
                    cubeMaterial = new THREE.MeshBasicMaterial({
                        color: 0x00dd00, wireframe: true, transparent: true
                    });
                    cube = new THREE.Mesh(cubeGeometry, cubeMaterial);

                    scene.add(cube);

                    camera.lookAt(cube.position);

                    effect.render(scene, camera);

                    d.body.appendChild(renderer.domElement);

                }, false);
            })(window, document, THREE);
        </script>
    </head>
    <body></body>
</html>