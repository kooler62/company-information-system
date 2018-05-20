<template>
    <div class="container">
        <h1>Використані технології:</h1>
        <div style="margin-left: 150px;">
            <a href="https://laravel.com/" target="_blank">
                <img src="/assets/examples/laravel.png" alt="">
            </a>
            <a href="https://vuejs.org/" target="_blank">
                <img src="/assets/examples/vue-js.png" alt="">
            </a>
            <div>
                <a href="https://vuematerial.io/" target="_blank">
                    <img src="/assets/examples/vue-material.png" alt=""><span>Vue Material</span>
                </a>
                <a href="https://www.mysql.com/" target="_blank">
                    <img src="/assets/examples/mysql.png" alt="">
                </a>
            </div>
        </div>
    </div>
</template>

<style scoped>
    h1 {
        text-align: center;
    }

    div span {
        font-weight: bold;
        font-size: 22px;
        color: #636b6f;
        margin-left: 10px;
        margin-right: 50px;
        text-align: center;
    }

    a:hover {
        text-decoration: none;
    }

    img, div {
        max-height: 200px;
    }
</style>