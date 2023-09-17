<script>
import { ElNotification } from "element-plus";

var BaseToast = {
  open(
    showClose,
    message,
    type,
    customClass,
    title = type == "success" ? "Alerte de succès !" : "Alerte d'erreur !"
  ) {
    ElNotification({
      title: title,
      message,
      customClass,
      showClose,
      type,
      duration: 4000,
      offset: 50,
      position: "top-right",
      iconClass: "el-icon-success",
      dangerouslyUseHTMLString: true,
      style: {
        fontSize: "16px",
        fontWeight: "bold",
        width: "100%",
        maxWidth: "800px",
        display: "flex",
        alignItems: "center",
      },
    });
  },
};
export default BaseToast;
</script>
<style>
div#notification_1 {
  display: flex;
  align-items: center;
  width: 100%;
  margin: auto;
}
.el-notification {
  transform: translateX(0px) !important;
  left: 27%;
  position: absolute;
  top: 30%;
}
.el-notification .el-notification__icon {
  height: 50px;
  width: 50px;
  font-size: 36px;
}
.el-notification .el-notification__icon {
  font-size: 96px;
  width: 50px;
  height: 46px;
}
.el-notification__content {
  margin: 0;
  color: gray;
}
.el-notification__group {
  width: 100%;
  display: flex;
  flex-direction: column-reverse;
}
.el-notification .el-notification__closeBtn {
  left: 96%;
  cursor: pointer;
}
</style>
