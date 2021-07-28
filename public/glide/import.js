import Glide, { Controls } from "./dist/glide.modular.esm";
// new Glide(".images").mount({ Controls });
// $(document).ready(function() {
new Glide(".images", {
  type: "carousel",
  perView: 1,
  focusAt: "center",
  gap: 40,

  breakpoints: {
    1366: {
      perView: 1
    },
    1200: {
      perView: 1
    },
    800: {
      perView: 1
    },
    500: {
      perView: 1
    }
  }
}).mount({ Controls });
// });
