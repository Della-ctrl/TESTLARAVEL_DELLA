@push('css')
<style>
    .loader {
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        background-color: #f4f6f9;
        height: 100vh;
        width: 100%;
        transition: height 200ms linear;
        position: fixed;
        left: 0;
        top: 0;
        z-index: 9999;
    }

    .dark-mode .loader {
        background-color: #454d55 !important;
        color: #fff;
    }
    .loading {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        font: 14px arial;
    }
    .hide {
        visibility: hidden;
        position: fixed;
    }
</style>
@endpush
<div class="loader flex-column justify-content-center align-items-center hide">
    <div class="loading animation__shake">
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
    </div>
</div>
