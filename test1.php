<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>vr.js</title>
        <script src="vr.js"></script>
        <script>
            (function (w, d, vr) {
                w.addEventListener('load', function () {

                    // NPAPI プラグインの確認
                    if (!vr.isInstalled()) {
                         throw new Error('NPVR plugin not installed.');
                    }

                    // 読込
                    vr.load(function (err) {
                        if (err) throw new Error('NPVR plugin load failed.');

                        // 初期化
                        var vrstate = new vr.State();

                        // センサーの値を取得
                        (function tick () {
                            vr.requestAnimationFrame(tick);

                            if (vr.pollState(vrstate) && vrstate.hmd.present) {

                                // 傾き (クォータニオン) の取得
                                var x = vrstate.hmd.rotation[0],
                                    y = vrstate.hmd.rotation[1],
                                    z = vrstate.hmd.rotation[2],
                                    w = vrstate.hmd.rotation[3];

                                d.body.innerHTML = 'x: ' + x + '<br>' +
                                                   'y: ' + y + '<br>' +
                                                   'z: ' + z + '<br>' +
                                                   'w: ' + w;
                            }
                        })();
                    });

                }, false);
            })(window, document, vr);
            console.log("hello???");
        </script>
    </head>
    <body></body>
</html>