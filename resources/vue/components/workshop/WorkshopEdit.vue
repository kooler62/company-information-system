<template>
    <div class="ws-edit">
        <md-dialog-alert
                class="dialog-alert"
                :md-active.sync="edited"
                md-title="Збережено!"
                md-content="Ваші дані успішно оновлено" />

        <span class="md-display-1">Редагування</span>
        <md-field>
            <label>Назва цеху</label>
            <md-input v-model="workshop.workshop_name" name="workshop_name"></md-input>
            <span class="md-helper-text"></span>
        </md-field>

        <md-button class="md-raised md-accent">Назад</md-button>
        <md-button class="md-raised md-primary" @click="updateWorkshop()">Зберегти</md-button>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        props: ['workshopId'],
        data: () => ({
            workshop: {},
            edited: false,
        }),
        created() {
            this.fetchWorkshop();
        },
        methods: {
            updateWorkshop: function() {
                let uri = '/workshop/' + this.workshopId;
                axios.put(uri, this.workshop).then((response) => {
                    this.$router.push({name: 'Transport'});
                    this.edited = true;
                })
            },
            fetchWorkshop() {
                axios.get('/workshop/' + this.workshopId, this.workshop).then(response => {
                    this.workshop = response.data;
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