THREE.OculusRiftControls = function (camera, vrstate) {
    var quaternion = new THREE.Quaternion();

    this.update = function () {
        if (!vr || !vrstate.hmd.present) return;

        var x = vrstate.hmd.rotation[0],
            y = vrstate.hmd.rotation[1],
            z = vrstate.hmd.rotation[2],
            w = vrstate.hmd.rotation[3];

        quaternion.set(x, y, z, w);

        camera.quaternion = quaternion;
    };
};