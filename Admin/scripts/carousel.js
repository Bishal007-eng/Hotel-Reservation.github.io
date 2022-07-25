

let carousel_s_form = document.getElementById('carousel_s_form');
let carousel_picture_inp = document.getElementById('carousel_picture_inp');

let banner_s_form = document.getElementById('banner_s_form');
let banner_picture_inp = document.getElementById('banner_picture_inp');



carousel_s_form.addEventListener('submit', function (e) {
    e.preventDefault();
    add_image();
});

function add_image() {
    let data = new FormData();
    
    data.append('picture', carousel_picture_inp.files[0]); //.files[0] is used to select only one image, multiple selections is not possible, it takes the 1st selected file only.
    data.append('add_image', '');


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/carousel_crud.php", true);

    xhr.onload = function () {

        var myModal = document.getElementById('carousel-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 'inv_img') {
            alert('error', 'file type not supported !');
        } else if (this.responseText == 'inv_size') {
            alert('error', 'File too large !');
        } else if (this.responseText == 'upd_failed') {
            alert('error', 'File Upload failed !');

        } else {
            alert('success', 'New image Added !');
            carousel_picture_inp.value = '';
            get_carousel();

        }
    }
    xhr.send(data);
}

function get_carousel() {

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/carousel_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        document.getElementById('carousel-data').innerHTML = this.responseText;
    }
    xhr.send('get_carousel');
}

function rem_image(val) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/carousel_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        if (this.responseText == 1) {
            alert('success', 'Image Removed !');
            get_carousel();
        }
        else {
            alert('error', 'Server Down !');
        }

    }
    xhr.send('rem_image=' + val);
}



banner_s_form.addEventListener('submit', function (e) {
    e.preventDefault();
    add_banner();
});

function add_banner() {
    let data = new FormData();
    
    data.append('picture', banner_picture_inp.files[0]); //.files[0] is used to select only one image, multiple selections is not possible, it takes the 1st selected file only.
    data.append('add_banner', '');


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/carousel_crud.php", true);

    xhr.onload = function () {

        var myModal = document.getElementById('banner-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 'inv_img') {
            alert('error', 'file type not supported !');
        } else if (this.responseText == 'inv_size') {
            alert('error', 'File too large !');
        } else if (this.responseText == 'upd_failed') {
            alert('error', 'File Upload failed !');

        } else {
            alert('success', 'New banner Added !');
            carousel_picture_inp.value = '';
            get_banner();

        }
    }
    xhr.send(data);
}

function get_banner() {

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/carousel_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        document.getElementById('banner-data').innerHTML = this.responseText;
    }
    xhr.send('get_banner');
}

function rem_banner(val) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/carousel_crud.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        if (this.responseText == 1) {
            alert('success', 'Banner Removed !');
            get_banner();
        }
        else {
            alert('error', 'Server Down !');
        }

    }
    xhr.send('rem_banner=' + val);
}






window.onload = function () {
    get_carousel();
    get_banner();
}
