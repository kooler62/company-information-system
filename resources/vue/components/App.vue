<template>
    <section>
        <md-toolbar>
            <h3 class="md-title" style="flex: 1">Інформаційна система підприємства</h3>
            <md-button :to="{name: 'Transport'}">Транспорт</md-button>
            <md-button :to="{name: 'Staff'}">Інженерно-технічний персонал</md-button>
            <md-button >Робітники</md-button>
            <md-button >Іспитові лабораторії</md-button>
        </md-toolbar>
            <router-view style="padding: 10px 16px"></router-view>
    </section>
</template>