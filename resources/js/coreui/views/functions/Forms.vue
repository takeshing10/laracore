<template>
  <div class="animated fadeIn">
    <b-row>
      <b-col md="6">
        <b-card>
          <div slot="header">
            <strong>イベント登録</strong>
          </div>

          <b-form-group
                  :label-cols="3"
                  label="イベント名"
                  label-for="event_name"
          >
            <b-form-input
                    id="event_name"
                    type="text"
                    placeholder="twittin event"
            />
          </b-form-group>

          <b-form-group
                  :label-cols="3"
                  label="ハッシュタグ"
                  label-for="hash_tag"
          >
            <b-form-input
                    id="hash_tag"
                    type="text"
                    placeholder="#twittin"
            />
          </b-form-group>

          <b-form-group
                  :label-cols="3"
                  label="開始日時"
                  label-for="start_at"
          >
            <b-form-input
                    id="start_at"
                    type="datetime-local"
            />
          </b-form-group>

          <b-form-group
                  :label-cols="3"
                  label="終了日時"
                  label-for="end_at"
          >
            <b-form-input
                    id="end_at"
                    type="datetime-local"
            />
          </b-form-group>

          <div slot="footer" class="d-flex justify-content-around">
            <b-button
                    type="submit"
                    variant="primary"
                    id="resist_btn"
                    @click="resistEvent"
            >
              <i class="fa fa-dot-circle-o"/> 登録
            </b-button>
            <b-button
                    type="reset"
                    variant="danger"
                    @click="resetEvent"
            >
              <i class="fa fa-ban"/> クリア
            </b-button>
          </div>
        </b-card>
      </b-col>
    </b-row>
  </div>
</template>

<script>
  export default {
    name: 'Forms',
    data() {
      return {
        selected: [], // Must be an array reference!
        datepicker: new Date(),
        select2: 'a',
      }
    },
    methods: {
      resistEvent: function () {
        const event_name = $("#event_name").val();
        const hash_tag = $("#hash_tag").val();
        const start_at = $("#start_at").val();
        const end_at = $("#end_at").val();

        $.ajax({
          type: 'POST',
          url: '{{current_url()}}/Save',
          data: {
            'event_name': event_name,
            'hash_tag': hash_tag,
            'start_at': start_at,
            'end_at': end_at,
          },
        }).done(function (response) {
          console.log(response);
        });

        // db.collection("events").add({
        //     event_name: event_name,
        //     event_hash: hash_tag,
        //     start_at: start_at,
        //     end_at: end_at,
        // })
        // .then(function(docRef) {
        //     console.log("Document written with ID: ", docRef.id);
        //     $("#event_name").val('');
        //     $("#hash_tag").val('');
        //     $("#start_at").val('');
        //     $("#end_at").val('');
        // })
        // .catch(function(error) {
        //     console.error("Error adding document: ", error);
        // });
      },
      resetEvent: function () {
        $("#event_name").val('');
        $("#hash_tag").val('');
        $("#start_at").val('');
        $("#end_at").val('');
      }
    },
  }
</script>
