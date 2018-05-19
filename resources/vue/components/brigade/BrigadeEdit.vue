<template>
    <div class="brigade-add">
        <md-dialog-alert
                class="dialog-alert"
                :md-active.sync="added"
                md-title="Додано!"
                md-content="Ваші дані успішно внесено до бази даних" />

        <span class="md-display-1">Додати бригаду</span>

        <md-field>
            <label>Назва</label>
            <md-input v-model="form.brigade_name" required></md-input>
        </md-field>

        <div class="buttons">
            <md-button class="md-raised md-primary" @click="updateBrigade">
                Зберегти
            </md-button>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        props: ['brigadeId'],
        data: () => ({
            added: false,
            form: {}
        }),
        created() {
            this.fetchBrigade();
        },
        methods: {
            fetchBrigade() {
                axios.get('/brigade/' + this.brigadeId).then(response => {
                    this.form = response.data;
                });
            },
            updateBrigade() {
                axios.put('/brigade/' + this.brigadeId, this.form)
            }
        }
    }
</script>