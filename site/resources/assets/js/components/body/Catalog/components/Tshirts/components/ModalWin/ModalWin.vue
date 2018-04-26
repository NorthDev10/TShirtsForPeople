<template>
  <div>
    ModalWin
  </div>
</template>

<script>
import languagePack           from './lang/languages.js'

export default {
  name: 'modal-win',
  props: {
    tshirt: {
    //  required: true,
      type: Object,
    },
  },
  data () {
    return {
    
    }
  },
  methods: {

  },
  messages: languagePack,
  computed: {
   
  },
}
</script>

<style lang="scss" scoped>
 
</style>