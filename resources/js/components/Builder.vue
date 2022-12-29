<template>
    <div class="row">
        <div class="col-md-12">
            <select v-model="columns">
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
            <button class="btn btn-primary" @click.prevent="addRow">Aggiungi riga</button>

            <button class="btn btn-primary" @click.prevent="rightOpened=!rightOpened">Aggiungi campo</button>

        </div>
        <div class="col-md-12 mt-4">

            <div class="row mb-4" v-for="row in rows">
                <div
                    class="col"
                    :class="{'col-md-4':row.columns.length == 3,'col-md-6':row.columns.length == 2,'col-md-12':row.columns.length == 1}"
                    v-for="(column,index ) of row.columns">
                    <draggable
                        class="list-group"
                        :list="column.items"
                        group="index"
                        itemKey="name"
                    >
                        <template #item="{ element, index }">
                            <div class="list-group-item">{{ element.label }}</div>
                        </template>
                    </draggable>

                </div>
            </div>

        </div>

        <div id="mySidenav" class="sidenav" v-show="rightOpened">

            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-danger pull-right" @click.prevent="rightOpened=!rightOpened">chiudi</button>
                </div>
                <div class="col-md-12 mb-3" v-for="model of models">
                    <h5 class="">{{ model.name }}</h5>

                    <ul class="list-group">
                        <li @click="addField(field)" v-for="field of model.fields"
                            class="list-group-item cursor-pointer">{{ field.label }}
                        </li>
                    </ul>

                </div>
            </div>

        </div>
    </div>
</template>

<script>
import draggable from "vuedraggable";
import axios from 'axios';

export default {
    name: "Builder",
    components: {
        draggable
    },
    data() {
        return {
            rightOpened: false,
            rows: [],
            models: [],
            columns: 3
        };
    },
    mounted() {
        this.getAllFields()
    },
    methods: {
        getAllFields: function () {
            const $vm = this
            axios.get('/customview/model-ajax-list').then((res) => {
                $vm.models = res.data
            })
        },
        addField: function (field) {
            this.rows[0].columns[0].items.push(field)
        },
        addRow: function () {
            let columns = []
            for (let i = 0; i < this.columns; i++) {
                columns.push({
                    items: []
                })
            }

            this.rows.push({
                columns: columns
            })
        }
    }
}
</script>

<style scoped>
.list-group {
    min-height: 80px;
    background: #eee;
}


.sidenav {
    width: 400px;
    height: 100%;
    min-width: 300px;
    position: fixed;
    top: 0;
    right: 0;
    background-color: #e3e3e35e;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
    z-index: 999999;
}

.list-group li {
    cursor: pointer;
}

.list-group li:hover {
    background: #e3e3e3;
}
</style>
