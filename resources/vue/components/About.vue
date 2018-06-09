<template>


    <div class="container">

        <h1>Використані технології:</h1>

        <md-card>
            <md-card-media>
                <img src="/assets/examples/php.png" alt="People">
            </md-card-media>

            <md-card-content>
                PHP
            </md-card-content>
        </md-card>

        <md-card>
            <md-card-media>
                <img src="/assets/examples/laravel.png" alt="People">
            </md-card-media>

            <md-card-content>
                Laravel Framework
            </md-card-content>
        </md-card>

        <md-card>
            <md-card-media>
                <img src="/assets/examples/vue-js.png" alt="People">
            </md-card-media>

            <md-card-content>
                Vue.js
            </md-card-content>
        </md-card>

        <md-card>
            <md-card-media>
                <img src="/assets/examples/vue-material.png" alt="People">
            </md-card-media>

            <md-card-content>
                Vue Material
            </md-card-content>
        </md-card>

        <md-card>
            <md-card-media>
                <img src="/assets/examples/mysql.png" alt="People">
            </md-card-media>

            <md-card-content>
                MySql Database
            </md-card-content>
        </md-card>

        <md-card>
            <md-card-media>
                <img src="/assets/examples/eloquent.png" alt="People">
            </md-card-media>

            <md-card-content>
                Eloquent ORM
            </md-card-content>
        </md-card>

        <md-card>
            <md-card-media>
                <img src="/assets/examples/front.png" alt="People">
            </md-card-media>

            <md-card-content>
                HTML, CSS, JavaScript
            </md-card-content>
        </md-card>

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
    .md-card {
        width: 320px;
        margin: 4px;
        display: inline-block;
        vertical-align: top;
    }
    .md-card img {
        width: 320px;
        height: 144px;
    }

    .container {
        width: 1024px;
    }

</style>