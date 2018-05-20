<template>
    <div>
        <md-dialog-title>Іспитові лабораторії:</md-dialog-title>
        <br> <br>
        <md-card v-for="testLab in testLabs">
            <md-card-header-text>
                <div class="md-title">{{ testLab.name }}</div>
            </md-card-header-text>
        </md-card>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        props: ['productType', 'productId'],
        data: () => ({
            testLabs: [],
        }),
        created() {
            this.getTestLabs();
        },
        methods: {
            getTestLabs() {
                axios.get(`/${this.productType}/${this.productId}/test-labs`).then(response => {
                    this.testLabs = response.data.testLabs;
                })
            }
        }
    }
</script>

<style lang="scss" scoped>
    .md-card {
        width: 320px;
        margin: 4px;
        display: inline-block;
        vertical-align: top;
    }

    .md-title {
        padding: 10px 0 0 10px;
    }
</style>