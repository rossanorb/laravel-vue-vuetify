<template>
<v-app class="grey lighten-4">
    <Navbar />

    <v-content>
        <div class="dashboard">
            <!-- <v-container>
          
          <v-row style="background: blue;">
            <v-col cols="12" sm="6" md="4" lg="3" class="green">col 1</v-col>
            <v-col cols="12" sm="6" md="4" lg="3" class="orange">col 2</v-col>
            <v-col cols="12" sm="6" md="4" lg="3" class="blue">col 3</v-col>
            <v-col cols="12" sm="6" md="4" lg="3" class="yellow">col 4</v-col>
          </v-row>
          
        </v-container> -->

            <v-container fluid>
                <v-form ref="form-search">
                    <v-row>
                        <v-col cols="12">
                            <v-row :align="alignment" :justify="justify">
                                <v-col cols="8" id="search" class="table-border">
                                    <v-row>
                                        <v-col cols="12">
                                            <p>Utilize o campo de busca abaixo informando o número do pedido our a partir da data informada.</p>                                            
                                        </v-col>
                                    </v-row>
                                    <v-row :align="alignment" :justify="justify">
                                        <v-col cols="4">
                                            <v-text-field v-model="pedido" @focus="pedido=null" label="Número do pedido:"></v-text-field>
                                        </v-col>                                        
                                        <v-col cols="4">
                                            <v-menu ref="menu" v-model="menu" :close-on-content-click="false" transition="scale-transition" offset-y min-width="290px">
                                                <template v-slot:activator="{ on }">
                                                    <v-text-field v-model="dateFormatted" label="A partir da data:" prepend-icon="event" readonly
                                                        :disabled=" pedido ? '' : disabled " 
                                                        v-on="on"
                                                    ></v-text-field>
                                                </template>
                                                <v-date-picker v-model="date" no-title @input="menu = false"
                                                    locale="pt-BR" >
                                                 </v-date-picker>
                                            </v-menu>
                                            <!-- <p>Date in ISO format: <strong>{{ date }}</strong></p> -->
                                        </v-col>
                                        <v-col cols="4" :align="alignment" :justify="justify">
                                            <v-btn class="btn" @click="find({
                                                id: pedido,
                                                date: dateFormatted
                                            })" dark>Buscar</v-btn>
                                        </v-col>
                                    </v-row>
                                </v-col>
                            </v-row>
                        </v-col>
                    </v-row>
                </v-form>

                <v-form ref="form-orders"  v-show="orders.length">
                    <v-row>
                        <v-col cols="12">
                            <v-row :align="alignment" :justify="justify">
                                <v-col cols="8" id="orders" class="table-border">
                                    <v-row>
                                        <v-col cols="12">
                                            <p>Pedidos</p>
                                        </v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col cols="12">
                                            <v-simple-table>
                                                <template v-slot:default>
                                                    <thead>
                                                        <tr>
                                                            <th>Número</th>
                                                            <th>Status</th>
                                                            <th>Data Atualização</th>
                                                            <th class="text-center">Detalhes</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>                                                        
                                                        <tr v-for="order in orders" :key="order.id">
                                                            <td width="30%">{{order.id}}</td>
                                                            <td width="30%">{{order.historico.status}}</td>
                                                            <td width="30%">{{order.data | formatDateTime}}</td>                                                            
                                                            <td class="text-center" width="10%" v-on:click="getDetails(order.id)" ><v-icon style="cursor:pointer" color="blue darken-3">info</v-icon></td>
                                                        </tr>
                                                    </tbody>
                                                </template>
                                            </v-simple-table>
                                        </v-col>
                                    </v-row>
                                </v-col>
                            </v-row>
                        </v-col>
                    </v-row>
                </v-form>

                <v-form ref="form-details" v-show="orders.length && showDetails">
                    <v-row>
                        <v-col cols="12">
                            <v-row :align="alignment" :justify="justify">
                                <v-col cols="8" id="details" class="table-border">
                                    <v-row>
                                        <v-col cols="12">
                                            <p>Informações</p>
                                        </v-col>
                                    </v-row>                                             
                                    <v-row>
                                        <v-col cols="12">
                                            <v-simple-table>
                                                <template v-slot:default>                                                    
                                                    <tbody>
                                                        <tr><td>Status</td><td class="right">{{details.status}}</td></tr>
                                                        <tr><td>Valor Total</td><td class="right">{{details.total}}</td></tr>
                                                        <tr><td>Data Criação</td><td class="right">{{details.created_at | formatDateTime}}</td></tr>
                                                        <tr><td>CNPJ</td><td class="right">{{details.cnpj}}</td></tr>
                                                        <tr><td>Telefone</td><td class="right">{{details.telefone}}</td></tr>
                                                        <tr><td>País</td><td class="right">{{details.pais}}</td></tr>
                                                        <tr><td>Estado</td><td class="right">{{details.estado}}</td></tr>
                                                        <tr><td>Cidade</td><td class="right">{{details.cidade}}</td></tr>
                                                        <tr><td>Bairro</td><td class="right">{{details.bairro}}</td></tr>
                                                        <tr><td>Endereço Envio</td><td class="right">{{details.endereco}}</td></tr>
                                                        <tr><td>Executivo de Vendas</td><td class="right">{{details.executivo_vendas}}</td></tr>
                                                        <tr><td>Comentário</td><td class="right">{{details.comentario}}</td></tr>
                                                        <tr><td>Nfe</td><td class="right">{{details.nfe}}</td></tr>
                                                        <tr><td>Data Emissão Nfe</td><td class="right">{{details.nfe_data}}</td></tr>
                                                    </tbody>
                                                </template>
                                            </v-simple-table>
                                        </v-col>
                                    </v-row>
                                </v-col>
                            </v-row>
                        </v-col>
                    </v-row>
                </v-form>


            </v-container>

        </div>
    </v-content>

</v-app>
</template>

<script>
import Navbar from '@/components/partials/Navbar'
import '@/utils/filter'
import { mapState, mapGetters, mapActions} from 'vuex'

export default {
    components: {
        Navbar
    },
    props: ['disabled'],
    name: 'Dashboard',
    data() {
        return {
            alignment: 'center',
            justify: 'center',
            date: new Date().toISOString().substr(0, 10),
            menu: false,
            modal: false,
            pedido: null            
        }
    },

    watch: {
        date() {
            this.formatDate(this.date)
        }
    },

    computed: mapState({
        dateFormatted: state => state.dashboard.dateFormatted,
        orders: state => state.orders.orders,

        ...mapGetters('dashboard', ['showDetails']),
        ...mapGetters('orders', ['details'])
    }),

    methods: {
        ...mapActions('dashboard', ['formatDate','setShowDetails']),
        ...mapActions('orders', ['find', 'getDetails']),        
    },

    created() {
        this.formatDate(this.date)
    }

}
</script>

<style lang="scss" scoped>
.table-border {
    border: solid grey 1px;
}

.right{
    text-align: right
}

.dashboard {
    .container {
        margin-top: 10px;
    }

    .v-application {
        p {
            margin-bottom: 0px;
        }
    }
}
</style>
