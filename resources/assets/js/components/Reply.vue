<template>
  <li
    :id="'reply-'+id"
    class="list-group-item"
    @mouseover="activeMenu = true"
    @mouseleave="activeMenu = false"
  >
    <div class="media">
      <a :href="'/profiles/'+reply.owner.id" :title="reply.owner.name">
        <img
          class="avatar rounded-circle mr-3"
          :src="reply.owner.avatar_path"
          :alt="reply.owner.name"
          :title="reply.owner.name"
        />
      </a>
      <div class="media-body">
        <a :href="'/profiles/'+reply.owner.id" :title="reply.owner.name" v-text="reply.owner.name"></a>
        <span>•</span>
        <span class="text-xs-muted" :title="reply.created_at" v-text="ago"></span>
        <span class="pull-right" v-show="activeMenu" v-if="authorize('owns', reply)">
          <button class="btn btn-link btn-sm text-xs-muted" @click="editing = !editing">แก้ไข</button>
          <button class="btn btn-link btn-sm text-xs-muted" @click="destroy">ลบ</button>
        </span>
        <div class="reply-body mt-1">
          <div v-if="editing">
            <div class="form-group">
              <textarea class="form-control" v-model="body"></textarea>
            </div>
            <button class="btn btn-sm btn-primary" @click="update">อัพเดต</button>
            <button class="btn btn-sm btn-link" @click="editing = false">ยกเลิก</button>
          </div>
          <div v-else v-text="body"></div>
        </div>
      </div>
    </div>
  </li>
</template>

<script>
import moment from "moment";

export default {
  props: ["reply"],
  data() {
    return {
      editing: false,
      activeMenu: false,
      id: this.reply.id,
      body: this.reply.body
    };
  },
  computed: {
    ago() {
      return moment(this.reply.created_at).fromNow();
    }
  },
  methods: {
    update() {
      axios
        .patch("/replies/" + this.id, {
          body: this.body
        })
        .then(response => {
          this.editing = false;
          this.activeMenu = false;
          flash(response.data.message);
        })
        .catch(error => {
          flash(error.response.data, "danger");
        });
    },
    destroy() {
      axios
        .delete("/replies/" + this.id)
        .then(response => {
          this.$emit("deleted", this.id);
        })
        .catch(error => {
          flash(error.response.data, "danger");
        });
    }
  }
};
</script>