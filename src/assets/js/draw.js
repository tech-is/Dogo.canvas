var can;
var ct;
var ox = 0, oy = 0, x = 0, y = 0;
var mf = false;
var can = document.getElementById("canvas");
$(function () {
    canvas_resize();
    mam_draw_init();
});

window.addEventListener('resize',
    function () {
        canvas_resize();
        mam_draw_init();
    }
    , false);

function canvas_resize() {
    can.width = $('#wrap').width();
    can.height = $('#wrap').height();
}

function mam_draw_init() {
    //初期設定
    can.addEventListener("touchstart", onDown, false);
    can.addEventListener("touchmove", onMove, false);
    can.addEventListener("touchend", onUp, false);
    can.addEventListener("mousedown", onMouseDown, false);
    can.addEventListener("mousemove", onMouseMove, false);
    can.addEventListener("mouseup", onMouseUp, false);
    ct = can.getContext("2d");
    ct.strokeStyle = "#000000";
    ct.lineWidth = 5;
    ct.lineJoin = "round";
    ct.lineCap = "round";
    ct.fillStyle = "#fff";
    ct.fillRect(0, 0, can.getBoundingClientRect().width, can.getBoundingClientRect().height);
}

function onDown(event) {
    mf = true;
    ox = event.touches[0].pageX - event.target.getBoundingClientRect().left;
    oy = event.touches[0].pageY - event.target.getBoundingClientRect().top;
    event.stopPropagation();
}
function onMove(event) {
    if (mf) {
        x = event.touches[0].pageX - event.target.getBoundingClientRect().left;
        y = event.touches[0].pageY - event.target.getBoundingClientRect().top;
        drawLine();
        ox = x;
        oy = y;
        event.preventDefault();
        event.stopPropagation();
    }
}
function onUp(event) {
    mf = false;
    event.stopPropagation();
}

function onMouseDown(event) {
    ox = event.clientX - event.target.getBoundingClientRect().left;
    oy = event.clientY - event.target.getBoundingClientRect().top;
    mf = true;
}
function onMouseMove(event) {
    if (mf) {
        x = event.clientX - event.target.getBoundingClientRect().left;
        y = event.clientY - event.target.getBoundingClientRect().top;
        drawLine();
        ox = x;
        oy = y;
    }
}
function onMouseUp(event) {
    mf = false;
}
function drawLine() {
    ct.beginPath();
    ct.moveTo(ox, oy);
    ct.lineTo(x, y);
    ct.stroke();
}

function clearCan() {
    ct.fillStyle = "#fff";
    ct.fillRect(0, 0, can.getBoundingClientRect().width, can.getBoundingClientRect().height);
}

function blob() {
    var base64 = this.canvas.toDataURL('image/png');
    // Base64からバイナリへ変換
    var bin = atob(base64.replace(/^.*,/, ''));
    var buffer = new Uint8Array(bin.length);
    for (var i = 0; i < bin.length; i++) {
        buffer[i] = bin.charCodeAt(i);
    }
    // Blobを作成
    var blob = new Blob([buffer.buffer], {
        type: type
    });
    return blob;
}

function upload_canvas() {
    img_name = $("#img_name").val();
    if (!window.confirm("アップロードしますか？")) {
        return;
    }
    var base64 = can.toDataURL('image/png');
    var image_data = base64.replace(/^.*,/, '');
    $.ajax({
        url: './upload.php',
        method: 'POST',
        data: {
            img_name: img_name,
            image_data: image_data
        }
    })
        .then(
            function () {
                alert('アップロード成功');
                location.href = './';
            }
        ),
        error => alert('アップロード失敗');
}