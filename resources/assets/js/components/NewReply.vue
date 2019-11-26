<template>
  <div v-if="signedIn" class="reply-box">
    <div class="form-group">
      <textarea
        name="body"
        id="body"
        class="form-control"
        placeholder="Have something to say?"
        rows="3"
        required
        v-model="body"
      ></textarea>
    </div>
    <button class="btn btn-sm btn-primary" @click="addReply">คอมเม้นต์</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      body: ""
    };
  },
  methods: {
    addReply() {
      axios
        .post(location.pathname + "/replies", { body: this.body })
        .then(({ data }) => {
          this.body = "";
          flash("Your reply has been posted.");
          this.$emit("created", data);
        });
    }
  }
};
</script>