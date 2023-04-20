import './bootstrap';
import $ from 'jquery';

window.$ = window.jQuery = $;

function openModal() {
    let modal = $('#modal');
    let contentModal = $('#content-modal');

    modal.removeClass('opacity-0 hidden');
    modal.addClass('opacity-100');
    contentModal.removeClass('opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95');
    contentModal.addClass('opacity-100 !translate-y-0 !sm:scale-100');
}

function closeModal() {
    let modal = $('#modal');
    let contentModal = $('#content-modal');

    modal.removeClass('opacity-100');
    modal.addClass('opacity-0 hidden ease-in duration-200 ease-in duration-200');
    contentModal.addClass('opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95');
    contentModal.removeClass('opacity-100 !translate-y-0 !sm:scale-100');
}

$('#add-products').click((e) => {
    e.preventDefault();
    openModal();
});

window.onclick = function(e) {
    let modal = $('#modal');
    let contentModal = $('#content-modal');
    if ($(e.target).parents('#content-modal')[0] !== contentModal[0]) {
        if ($(e.target).parents('#modal')[0] === modal[0]) {
            closeModal();
        }
    }
}

$('#modal-back').click((e) => {
    e.preventDefault();
    closeModal();
})

let openMenu = $('#open-menu');
let mobileMenu = $('#mobile-menu');
let btnSubmit = $('#btn-submit');
let formUpload = $('#form-upload');

openMenu.click(() => {
    mobileMenu.toggleClass('hidden');
})

$('#file_input').change(() => {
    btnSubmit.prop("disabled", false);
})

const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
let productList = $('#product-list');
let processLoading = $('#process-loading');

btnSubmit.click((e) => {
    e.preventDefault();

    processLoading.removeClass('hidden');

    let inputFile = $('#form-upload input[type=file]')[0];
    let dataFile = inputFile.files;
    let formData = new FormData();
    formData.append('file', dataFile[0]);
    formData.append('_token', CSRF_TOKEN);

    $.ajax({
        type: 'POST',
        url: formUpload.attr('action'),
        processData: false,
        contentType: false,
        data: formData,
        success: function (data) {
            processLoading.addClass('hidden');
            closeModal();
            productList.html(data);
            toasting.create({
                "title": "Import Success",
                "text": "Import Data Success",
                "type": "success",
                "progressBarType": "rainbow"
            });
        },
        error: function (data) {
            processLoading.addClass('hidden');
            closeModal();
            toasting.create({
                "title": data.statusText,
                "text": data.responseJSON.message,
                "type": "error",
                "progressBarType": "rainbow"
            });
        },
    });
})
