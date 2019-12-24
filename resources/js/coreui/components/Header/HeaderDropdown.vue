<template>
  <b-nav-item-dropdown
    right
    no-caret
  >
    <template slot="button-content">
      <i class="fa fa-user-circle fa-2x"></i>
    </template>

    <b-dropdown-header
      tag="div"
      class="text-center"
    >
      <strong>Settings</strong>
    </b-dropdown-header>
    <b-dropdown-item>
      <i class="fa fa-wrench" /> Settings
    </b-dropdown-item>
    <b-dropdown-item>
      <i class="fa fa-lock" /> Logout
    </b-dropdown-item>
  </b-nav-item-dropdown>
</template>
<script>
export default {
  name: 'HeaderDropdown',
  data: () => {
    return { itemsCount: 42 }
  },
}

</script>
