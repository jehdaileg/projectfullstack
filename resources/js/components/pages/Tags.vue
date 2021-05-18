<template>
    <div>
        	<div class="content">
			<div class="container-fluid">

				<!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
				<div class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20">
					<p class="_title0">Tags</p> &nbsp; <Button @click="modalAdd=true"><Icon type="md-add" /> Create</Button>

					<div class="_overflow _table_div my-2" >
						<table class="_table">
								<!-- TABLE TITLE -->
							<tr>
								<th>#</th>
								<th>Tag Name</th>
								<th>Created</th>
								<th>Action</th>
							</tr>
								<!-- TABLE TITLE -->


								<!-- ITEMS -->
							<tr v-for="(item,i) in tags" :key="i">
								<td>{{ item.id }}</td>
								<td class="_table_name">{{ item.nameTag }}</td>
								<td>{{ item.created_at }}</td>
								<td>
									<Button type="info" size="small">Show</Button>
                                    <Button type="success" @click="showEditModal(item, i)" size="small">Edit</Button>
                                    <Button type="error" size="small"  :loading="item.isDeleting" @click="showDeletingModal(item, i)">Delete</Button>
								</td>
							</tr>


						</table>
					</div>
				</div>

                <!-- Modal to add Tag -->
                <Modal v-model="modalAdd"
                title="Add Tag"
                :mask-closable="false"

                >

               <Input v-model="data.nameTag" placeholder="Enter a tag name here..." />

                <div slot="footer">

                    <Button type="default" @click="modalAdd=false">Cancel</Button>
                    <Button type="primary" @click="addTag()" :disabled="isAdding" :loading="isAdding">{{isAdding ? 'Adding tag...Wait' : 'Add Tag'}}</Button>


                </div>

                </Modal>


                <!--  Edit Modal    -->

                <Modal v-model="modalEdit" title="Edit tag" :mask-closable="false">

                    <Input v-model="editData.nameTag" placeholder="Enter tag name..."/>

                    <div slot="footer">

                         <Button type="default" @click="modalEdit=false">Cancel</Button>
                         <Button type="success" @click="editTag()">Confirm</Button>

                    </div>


                </Modal>


                <!-- Delete alert Modal -->

                 <Modal v-model="showDeleteModal">

                    <p slot="header" style="color:#f60;text-align:center">
                        <Icon type="ios-information-circle"></Icon>
                        <span>Delete Confirmation</span>
                    </p>

                    <div style="text-align:center">
                        <p>Are you sure you want to delete this tag ?</p>
                    </div>

                    <div slot="footer">
                            <Button type="error" :loading="isDeleing" size="large" @click="deleteTag()" >Delete</Button>
                    </div>

                </Modal>





			</div>
		</div>

    </div>
</template>

<script>
export default {

 data() {
     return {

        tags : [],

        index : -1,

        showDeleteModal : false,

        deleteItem : {},

        indexDelete: -1,

        isDeleing : false,

        modalAdd : false,

        modalEdit : false,

        isAdding : false,

        data : {

            nameTag : ''
        },

       editData : {

           nameTag : ''
       },

     }


 },

 methods: {
    async addTag() {

       // if(this.data.nameTag.trim() === '') return this.errore("Tag name is required please!")

        const res = await this.callApi('post', '/app/create_tag', this.data)

        if(res.status === 201){

            this.tags.unshift(res.data)

            this.success("Tag added successfully")

            this.modalAdd = false

            this.data.nameTag = ''
            //this.created()

        }else {

            //validation backend side
         if(res.status == 422){

             if(res.data.errors.nameTag){

                 this.errore(res.data.errors.nameTag[0])
             }
         }

            this.swr()
        }

     },

   async  editTag(){

       if(this.editData.nameTag.trim() === '') return this.errore("Tag name is required")

       const res = await this.callApi('post', '/app/edit_tag', this.editData)

       if(res.status === 200){

           this.tags[this.index].nameTag = this.editData.nameTag

           this.success("Congratulations ! Tag updated successfully")

           this.modalEdit = false

       } else {

           if(res.status == 422){

               if(res.data.errors.nameTag){

                   this.errore(res.data.errors.nameTag[0])

               }


           }

           this.swr();
       }

     },

     async deleteTag(){

         this.isDeleing = true

         const res = await this.callApi('post', '/app/delete_tag', this.deleteItem)

         if(res.status == 200){

             this.tags.splice(this.indexDelete, 1)

             this.success("Congratulations ! Tag dropped successfully")

             this.showDeleteModal = false

         }else {

             this.swr()
         }

         this.isDeleing = false

     },

     showEditModal(item, index){

         let obj = {

             id : item.id,

             nameTag : item.nameTag
         }

         this.editData = obj

         this.modalEdit = true

         this.index = index


     },

     showDeletingModal(item, i){

/*if(!confirm("Are you sure to want to delete this tag ?")) return

        this.$set(item, 'isDeleting', true) */

        this.deleteItem = item

        this.indexDelete = i

        this.showDeleteModal = true


     }
 },


async created() {

    const res = await this.callApi('get', 'app/get_tags')

    if(res.status == 200){

      this.tags = res.data

    }else
    {

        return this.swr()


    }
},
}
</script>
