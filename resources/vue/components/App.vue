<template>
    <section>
        <md-toolbar>
            <h3 class="md-title">Інформаційна система підприємства</h3>
            <md-button :to="{ name: 'Transport' }">Транспорт</md-button>
            <md-button :to="{ name: 'Engineers' }">Інженерно-технічний персонал</md-button>
            <md-button :to="{ name: 'Workers' }">Робітники</md-button>
            <md-button :to="{ name: 'TestLabs' }">Іспитові лабораторії</md-button>

            <md-menu md-direction="bottom-start">
                <md-button md-menu-trigger>Інше</md-button>

                <md-menu-content>
                    <md-menu-item :to="{ name: 'About' }">Використані технології</md-menu-item>
                    <md-menu-item :to="{ name: 'Title' }">Титульна сторінка</md-menu-item>
                    <md-menu-item href="/assets/Документація.pdf" target="_blank">Документація</md-menu-item>
                </md-menu-content>
            </md-menu>
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