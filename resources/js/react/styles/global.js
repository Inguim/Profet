import { createGlobalStyle } from "styled-components";
import "react-toastify/dist/ReactToastify.css";

export default createGlobalStyle`

  :root {
    --form-black:  #232323;
    --form-left: #e6ecf0;
    --register-gray: #727272;
    --header-white: rgb(243, 243, 243);
    --green: #59C15D;
    --red: #E02041;
    --orange: #e65400;
    --yellow: #ffba01;
    --blue: #086BAB;
    --blue-mustang: #032156;
    --blue-icon: #0184ff;
    --light-blue: #5989C1;
    --light-fake-blue: #6fc2d1;
    --light-white: #FAFAFA;
    --light-gray: #D3D3D3;
    --dark-white:  #a4a0a0;
    --dark-gray: #778899;
    --dark-green: #08ab11;
    --dark-red: #c15959;

    --light-gray-rgba:  rgba(184, 184, 184, 0.2);
    --red-rgba: rgba(224, 31, 63, 0.09);
  }

  #admin-area {
      text-rendering: optimizelegibility;
      -webkit-font-smoothing: antialiased !important;
  }

`;
