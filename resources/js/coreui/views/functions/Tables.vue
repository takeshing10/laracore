<template>
  <div class="animated fadeIn">
    <b-row>
      <b-col lg="12">
        <c-table>
          <template slot="caption">
            <strong>イベント一覧</strong>
          </template>
        </c-table>
      </b-col><!--/.col-->
    </b-row><!--/.row-->
  </div>
</template>

<script>
  import cTable from './Table.vue'

  export default {
    name: 'Tables',
    components: {cTable},
  }
</script>
