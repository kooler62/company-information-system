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
            <md-button class="md-raised md-primary" @click="addBrigade">
                Додати
            </md-button>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        data: () => ({
            added: false,
            form: {}
        }),
        methods: {
            addBrigade() {
                axios.post('/brigade', this.form);
            }
        }
    }
</script>