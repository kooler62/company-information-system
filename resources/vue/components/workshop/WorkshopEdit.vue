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
        <md-button class="md-raised md-primary" @click="updateCar()">Зберегти</md-button>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        props: ['workshopId'],
        data: () => ({
            workshops: [],
            workshop: [],
            edited: false,
        }),
        created() {
            this.fetchWorkshops();
        },
        methods: {
            updateCar: function() {
                let uri = '/workshop/' + this.$route.params.id;
                axios.put(uri, this.workshop).then((response) => {
                    this.$router.push({name: 'Transport'})
                })
            }
        }
    }
</script>