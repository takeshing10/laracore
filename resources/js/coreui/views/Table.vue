<template>
    <b-card>
        <div v-if="errored">
            <p class="alert alert-danger">We're sorry, we're not able to retrieve this information, please try back later</p>
        </div>

        <template slot="header">
            <slot name="caption">
                Table
            </slot>
        </template>
        <b-table
            :hover="hover"
            :striped="striped"
            :bordered="bordered"
            :small="small"
            :fixed="fixed"
            :items="items"
            :fields="fields"
            :current-page="currentPage"
            :per-page="perPage"
            responsive="sm"
        >
            <template slot="_" slot-scope="data">
                <b-button pill variant="success" @click="loadEvnets" :disabled="checkDisabled(data.item.start_at)" ><i class="fa fa-chevron-circle-right"></i> OPEN </b-button>
            </template>
            <template slot="__" slot-scope="data">
                <i class="icon-options-vertical icons font-lg d-block mt-2"></i>
            </template>
        </b-table>
        <nav>
            <b-pagination
                    v-model="currentPage"
                    :total-rows="dataLength"
                    :per-page="perPage"
                    prev-text="Prev"
                    next-text="Next"
                    hide-goto-end-buttons
            />
        </nav>
    </b-card>
</template>

<script>
  export default {
    name   : 'CTable',
    props  : {
      hover   : {
        type   : Boolean,
        default: true,
      },
      striped : {
        type   : Boolean,
        default: false,
      },
      bordered: {
        type   : Boolean,
        default: false,
      },
      small   : {
        type   : Boolean,
        default: false,
      },
      fixed   : {
        type   : Boolean,
        default: false,
      },
    },
    data() {
      return {
        items       : [],
        dataLength  : '',
        errored     : false,
        fields      : [
          { key: 'event_name' },
          { key: 'hash' },
          { key: 'start_at' },
          { key: 'end_at' },
          { key: '_' },
          { key: '__' },
        ],
        currentPage: 1,
        perPage    : 5,
        totalRows  : 0,
      }
    },
    methods: {
      checkDisabled(StartAt){
        const currentDate = new Date();
        const currentTime = currentDate.getTime();
        const startTime = Date.parse(StartAt);

        let isDisabled = true;
        //イベント開始時刻を過ぎたら、開始ボタンを活性化する
        if(startTime < currentTime){
          isDisabled = false;
        }
        return isDisabled;
      },
      loadEvnets(){
        console.log('click')
        axios
          .get('/api/events')
          .then(response => {
            this.items = response.data
            this.dataLength = response.data.length
          })
          .catch(error => {
            console.log(error)
            this.errored = true
          })
      },
    },
    mounted(){
      axios
        .get('/api/events')
        .then(response => {
          this.items = response.data
          this.dataLength = response.data.length
        })
        .catch(error => {
          console.log(error)
          this.errored = true
        })
    }
  }
</script>
