import axios from "axios"
import { Notice } from "view-design"

export default {

    data() {
        return {

        }
    },

    methods: {

       async callApi(method, url, dataObj){

       try {

      return  await axios({

            method : method,

            url : url,

            data : dataObj

        })

       } catch (e) {

        console.log(e)

        return e.response

       }
       },

       //other methods for notifications

       info(desc, title="Info"){

        this.$Notice.info({

            title : title,

            desc : desc


        })

       },

       success(desc, title="Sucess"){

        this.$Notice.success({

            title : title,

            desc : desc
        })

       },

       warning(desc, title="Warning"){

        this.$Notice.warning({

            title : title,

            desc : desc
        })

       },

       errore(desc, title="Error"){

        this.$Notice.error({

            title : title,

            desc : desc
        })


       },

       swr(desc="Something went wrong, Please Try again !!!", title = "Oops"){

        this.$Notice.error({

            title : title,

            desc : desc
        })
       },

       //Short forms of notices components

       i(desc, title="Hey"){
           this.$Notice.info({

            title : title,

            desc : desc
           })
       },

       s(desc, title="Whaouh"){

        this.$Notice.success({

            title : title ,

            desc : desc
        })
       },

       w(desc, title="Uhm"){

        this.$Notice.warning({

            title : title,


            desc :desc
        })
       },

       e(desc, title="Oops"){

        this.$Notice.error({

            title : title,

            desc : desc
        })
       },

       erg(desc="Something went wrong, please try again", title="Olala"){

        this.$Notice.error({

            title : title,

            desc : desc
        })
       }


    },


}
