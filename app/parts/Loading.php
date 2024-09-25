<style type="text/css">
.loader {
    width: 45px;
    aspect-ratio: 1;
    --c: no-repeat linear-gradient(#000 0 0);
    background: var(--c), var(--c), var(--c);
    animation:
        l18-1 1.5s infinite,
        l18-2 1.55s infinite;
}

@keyframes l18-1 {

    0%,
    100% {
        background-size: 20% 100%
    }

    33%,
    66% {
        background-size: 20% 20%
    }
}

@keyframes l18-2 {

    0%,
    33% {
        background-position: 0 0, 50% 50%, 100% 100%
    }

    66%,
    100% {
        background-position: 100% 0, 50% 50%, 0 100%
    }
}

#loader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: white;
    z-index: 9999;
    transition: opacity 1.5s;
    opacity: 1;
}

#loader.fade-out {
    opacity: 0;
    pointer-events: none;
}
</style>
<div id="loader">
    <div class="loader"></div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ローダーを終了させる
        var loader = document.getElementById('loader');
        setTimeout(function() {
            loader.classList.add('fade-out');
        }, 3500); 
    });
</script>
