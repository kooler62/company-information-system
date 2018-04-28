<template>
    <div class="ws-add">
        <md-dialog-alert
                class="dialog-alert"
                :md-active.sync="added"
                md-title="Додано!"
                md-content="Ваші дані успішно внесено до бази даних" />
        <span class="md-display-1">Додати Цех</span>
        <md-field>
            <label>Назва цеху</label>
            <md-input v-model="workshop.workshop_name" name="workshop_name"></md-input>
            <span class="md-helper-text"></span>
        </md-field>
        <md-field>
            <label>Іспитові Лабораторії</label>
            <md-select multiple>
                <md-option value="1">Лабораторія якості</md-option>
                <md-option value="2">Лабораторія характеристик</md-option>
                <md-option value="3">Фінальна лабораторія</md-option>
            </md-select>
        </md-field>
        <md-button class="md-raised md-accent">Назад</md-button>
        <md-button class="md-raised md-primary" @click="createWorkshop()">Додати</md-button>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data: () => ({
            workshops: [],
            workshop: {},
            added: false
        }),
        methods: {
            createWorkshop() {
                axios.post('/workshop', this.workshop).then(response => {
                    this.workshops.push(response.data.workshop);
                    this.added = true;
                }).catch(error => {
                    console.log(error.message);
                })
            },
        }
    }
</script>

<style lang="scss">
    .md-select-menu {
        z-index: 200;
    }
    .dialog-alert {
        z-index: 999;
    }
</style>