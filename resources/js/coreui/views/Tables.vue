<template>
    <div class="animated fadeIn">
        <div class="pb-3">
            <b-button pill variant="success" v-b-modal.modal-center> Create New Event</b-button>
            <b-modal id="modal-center" centered title="Create New Event">
                <template v-slot:default="{ hide }">
                    <b-row>
                        <b-col md="12">
                            <b-form-group :label-cols="3" label="Event Name" label-for="event_name">
                                <b-form-input
                                    v-model="event_name"
                                    type="text"
                                    placeholder="sample event"
                                    required
                                />
                            </b-form-group>
                            <b-form-group :label-cols="3" label="Hash Tag" label-for="hash_tag">
                                <b-form-input
                                    v-model="hash"
                                    type="text"
                                    placeholder="#sample"
                                    required
                                />
                            </b-form-group>
                            <b-form-group :label-cols="3" label="Start at" label-for="start_at">
                                <b-form-input
                                    v-model="start_at"
                                    type="datetime-local"
                                    required
                                />
                            </b-form-group>
                            <b-form-group :label-cols="3" label="End at" label-for="end_at">
                                <b-form-input
                                    v-model="end_at"
                                    type="datetime-local"
                                    required
                                />
                            </b-form-group>
                        </b-col>
                    </b-row>
                </template>
                <template v-slot:modal-footer="{ ok, cancel }">
                    <b-button variant="success" @click="resistEvent(); clearEvent(); ok()"> Create Event </b-button>
                    <b-button variant="danger" @click="clearEvent(); cancel()"> Cancel </b-button>
                </template>
            </b-modal>
        </div>
        <b-row>
            <b-col lg="12">
                <c-table>
                    <template slot="caption">
                        <i class="fa fa-align-justify"/> Event List
                    </template>
                </c-table>
            </b-col><!--/.col-->
        </b-row><!--/.row-->
    </div>
</template>

<script>
    import cTable from './Table.vue'

    export default {
    name        : 'Tables',
    components  : { cTable },
    data() {
        return {
          event_name    : "",
          hash          : "",
          start_at      : "",
          end_at        : "",
        }
    },
    methods     : {
        resistEvent(){
          axios.post('/api/events', {
            'event_name': this.event_name,
            'user_id'   : 9999,
            'hash'      : this.hash,
            'start_at'  : this.start_at,
            'end_at'    : this.end_at,
          })
            .then(function (response) {
              console.log(response);
            })
            .catch(function (error) {
              console.log(error);
            });
        },
        clearEvent(){
          this.event_name = ''
          this.hash = ''
          this.start_at = ''
          this.end_at = ''
        }
      },
    }
</script>
