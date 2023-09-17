<script>
import { ElMessageBox } from "element-plus";
import BaseToast from "@/common/components/BaseToast.vue";

var ConfirmationModal = {
  confirm({
    title = "Vous êtes sûr de vouloir supprimer cet élément ?",
    confirmation_msg,
    success_type,
    success_title = "Suppression effectuée",
    success_msg,
    callback,

    confirmButtonText,
    onCancel = () => {},
  }) {
    ElMessageBox.confirm(title, confirmation_msg, {
      confirmButtonText: confirmButtonText ? confirmButtonText : "Supprimer",
      cancelButtonText: "Annuler",

      showClose: true,
    })
      .then(async () => {
        await callback();
        BaseToast.open(
          true,
          success_msg,
          success_type,
          "el-notification--success",
          success_title
        );
      })
      .catch(async (err) => {
        await onCancel();
      });
  },
};
export default ConfirmationModal;
</script>

<style lang="scss">
.el-overlay.is-message-box .el-overlay-message-box {
  text-align: center;
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 16px;
  overflow: auto;
  z-index: 99999;
  background-color: rgba(128, 128, 128, 0.5);
}
.el-message-box {
  max-width: 52%;
  padding: 32px 24px;
  border-radius: 16px;
  margin: 10% auto auto auto;
  background-color: white;

  &__title {
    font-size: 1.5rem;
    font-weight: bold;
    width: 90%;
    line-height: 1.6;
  }
  &__header{
    display: flex;
    justify-content: space-between;
    text-align: left;
  }

  &__message {
    font-size: 1rem;
  }

  &__btns {
    padding: 30px 5px 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;

    .el-button {
      border-radius: 999px;
    }
  }
}

.el-message-box__headerbtn .el-message-box__close {
  color: #000000;
  font-size: 30px;
  font-weight: bold;
}

.el-message__content,
.el-message__icon {
  color: white !important;
  font-weight: bold;
  font-size: 18px;
}

.el-notification {
  padding: 10px;
  align-items: end !important;
  gap: 3rem;
  &--success {
    background-color: rgba(220,252,231,1);
  }

  &--error {
    background-color: rgb(252, 220, 220,1);
  }
}
.el-notification .el-notification--success{
  color: #67c23a;
}

.el-message-box__btns {
  button:first-child {
    background-color: #018fd7;
    color: white;
    font-weight: bold;
  }

  button:first-child:hover {
    background-color: black;
  }

  button:last-child {
    background-color: white;
    color: black;
    border-color: #d7d7d7;
    font-weight: bold;
  }

  button:last-child:hover {
    background-color: black;
    color: white;
  }
}
</style>
