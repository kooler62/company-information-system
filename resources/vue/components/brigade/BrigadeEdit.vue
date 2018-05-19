<template>
    <div class="brigade-add">
        <md-dialog-alert
                class="dialog-alert"
                :md-active.sync="edited"
                md-title="Додано!"
                md-content="Ваші дані успішно оновлено" />

        <span class="md-display-1">Редагування</span>

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
            edited: false,
            form: {}
        }),
        created() {
            this.fetchBrigade();
        },
        methods: {
            fetchBrigade() {
                axios.get('/brigade/' + this.brigadeId).then((response) => {
                    this.form = response.data;
                });
            },
            updateBrigade() {
                axios.put('/brigade/' + this.brigadeId, this.form);
                this.edited = true;
            }
        }
    }
</script>

<style lang="scss">
    .dialog-alert {
        z-index: 999;
    }
</style>