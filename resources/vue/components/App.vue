<template>
    <section>
        <md-toolbar>
            <h3 class="md-title">Інформаційна система підприємства</h3>
            <md-button :to="{ name: 'Transport' }">Транспорт</md-button>
            <md-button :to="{ name: 'Engineers' }">Інженерно-технічний персонал</md-button>
            <md-button :to="{ name: 'Workers' }">Робітники</md-button>
            <md-button :to="{ name: 'TestLabs' }">Іспитові лабораторії</md-button>
            <md-button :to="{ name: 'About' }" class="md-icon-button md-primary">
                <md-icon>info</md-icon>
                <md-tooltip md-delay="200">Використані технології</md-tooltip>
            </md-button>
        </md-toolbar>
            <router-view class="content"></router-view>
    </section>
</template>

<style>
    .content {
        padding: 10px 16px;
    }

    .md-title {
        flex: 1;
    }
</style>