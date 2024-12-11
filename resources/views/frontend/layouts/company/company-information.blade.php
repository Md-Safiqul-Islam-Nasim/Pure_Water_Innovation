    <!-- ===================== company information Page Start Hare ============================= -->
@extends('frontend.app')
@section('title', 'Company-Information')
@section('content')   

        <section>
            <div class="container">
                <a href="index.html">
                    <div class="company--logo--header">
                        <div class="company--logo--img">
                            <svg xmlns="http://www.w3.org/2000/svg" width="109" height="93" viewBox="0 0 109 93" fill="none">
                                <path d="M38.2447 37.5069C39.8826 44.2853 45.7157 50.4894 53.9052 50.4894C61.9705 50.4894 65.3114 45.639 65.4119 45.4882C60.1168 49.9088 54.0235 48.8341 50.5141 47.182C47.0107 45.5267 41.7333 39.3258 41.4436 32.8747C41.1598 26.4268 42.8745 22.4265 42.8745 22.4265C43.0401 23.745 43.7703 25.1436 44.7519 26.4813C44.7519 26.4813 44.7549 26.4845 44.7637 26.4942C44.7844 26.5198 44.7992 26.5423 44.8199 26.5679C46.7062 29.1054 49.4734 31.4183 50.9901 32.5443C53.3257 34.2701 55.28 37.0578 54.0264 39.1526C52.7758 41.2474 48.8555 40.4743 46.1562 36.8493C46.0055 36.644 45.8576 36.4387 45.7216 36.2302C43.1377 32.355 43.0312 28.1109 43.0312 28.1109C42.3217 33.0447 44.4237 37.2856 46.2834 39.7172C48.3766 42.4471 53.4292 45.0937 56.4212 42.9444C59.4102 40.7918 59.6999 37.1348 58.2513 34.1354C56.8026 31.136 51.1586 28.5472 47.5487 25.1436C43.9389 21.74 43.655 16.293 43.655 16.293C38.969 24.563 36.6038 30.7222 38.2447 37.5069Z" fill="#00CD78"/>
                                <path d="M70.2104 30.4977C69.5393 27.0556 67.8955 23.1163 65.415 18.484C59.7356 7.87544 54.0768 0 54.0768 0C54.0768 0 49.5978 6.76229 47.8416 9.4794C47.8061 9.53393 47.7736 9.58526 47.7381 9.6398C46.5201 11.5357 45.9376 13.8229 46.0795 16.1294C46.0825 16.1743 46.3841 20.5499 49.1425 23.1548C50.4581 24.393 52.1492 25.5703 53.7842 26.7091C56.5869 28.6563 59.2359 30.4977 60.4008 32.9132C62.5797 37.43 61.4947 42.4568 57.7606 45.1418C57.2639 45.5011 56.7436 45.7706 56.2026 45.9727C57.6542 46.0561 60.3949 45.7802 63.2952 44.4682C68.3863 42.1681 71.3516 36.3457 70.2104 30.4977Z" fill="#29BBEE"/>
                                <path d="M71.6001 45.9054C70.855 45.684 70.11 45.5621 69.3502 45.5525C70.2283 46.239 72.762 47.5991 72.7738 48.7636C72.4634 49.4726 71.6592 49.8351 71.0058 50.1911C69.7937 50.7942 68.4425 51.2722 67.0826 51.7598C65.7196 52.2506 64.3301 52.719 62.9316 53.3445C66.0537 53.8834 72.7531 53.2194 74.326 49.7324C75.0887 47.7371 73.1315 46.2999 71.6001 45.9054Z" fill="#29BBEE"/>
                                <path d="M37.2748 50.034C36.6983 49.6939 35.7108 49.2159 35.9089 48.4492C36.5416 47.0634 38.2149 46.3481 39.4774 45.5525C37.8631 45.7963 35.7877 46.1812 34.7706 47.8397C33.9044 49.3603 35.3205 50.9963 36.4558 51.6604C39.912 53.7487 43.9801 54.2331 47.8472 54.3967C50.0468 54.4448 52.2465 54.3069 54.4165 53.8706C52.2465 53.4279 50.106 53.1103 47.9802 52.7446C44.3556 52.0613 40.6481 51.6026 37.2748 50.034Z" fill="#29BBEE"/>
                                <path d="M6.58707 61.9353C8.09192 61.9353 9.28339 62.394 10.1703 63.3115C11.0543 64.229 11.4978 65.4384 11.4978 66.9397C11.4978 68.4698 11.0425 69.6985 10.1319 70.6224C9.2213 71.5462 7.9914 72.0082 6.44811 72.0082H3.29353V76.4479H0V61.9385H6.58707V61.9353ZM6.20864 69.0184C6.84724 69.0184 7.34984 68.8355 7.71645 68.4666C8.08305 68.0977 8.26635 67.6037 8.26635 66.9846C8.26635 66.3911 8.08009 65.9131 7.70758 65.5442C7.33506 65.1753 6.83541 64.9925 6.21159 64.9925H3.29649V69.0216H6.20864V69.0184Z" fill="#4E626D"/>
                                <path d="M23.2708 76.4449H20.0778V75.4055C19.2795 76.3166 18.2536 76.7689 17.0031 76.7689C15.8323 76.7689 14.8921 76.3518 14.1796 75.5242C13.4671 74.6934 13.1123 73.5994 13.1123 72.2425V65.5732H16.2846V71.5079C16.2846 72.1431 16.4443 72.6595 16.7636 73.0573C17.0829 73.4551 17.4968 73.654 18.0023 73.654C18.6557 73.654 19.1642 73.4038 19.5279 72.9065C19.8945 72.4093 20.0778 71.6458 20.0778 70.6225V65.5732H23.2708V76.4449Z" fill="#4E626D"/>
                                <path d="M32.9501 65.509L32.8111 68.9735H32.2316C29.9285 68.9735 28.7785 70.3305 28.7785 73.0444V76.4448H25.5854V65.5731H28.7785V67.6519C29.6033 66.1634 30.7534 65.4224 32.2316 65.4224C32.4948 65.4224 32.7372 65.4512 32.9501 65.509Z" fill="#4E626D"/>
                                <path d="M44.0633 71.8961H36.7193C36.8524 72.5473 37.1125 73.0574 37.4969 73.4327C37.8842 73.808 38.3424 73.9941 38.8746 73.9941C39.8739 73.9941 40.5835 73.5771 41.0092 72.7398L43.8445 73.3685C43.4187 74.4945 42.7772 75.3414 41.9198 75.9124C41.0624 76.4834 40.0454 76.7689 38.8746 76.7689C37.3964 76.7689 36.1458 76.23 35.1228 75.1554C34.0969 74.0807 33.5854 72.6981 33.5854 71.0075C33.5854 69.333 34.0969 67.9536 35.1228 66.8693C36.1487 65.785 37.4052 65.2461 38.8953 65.2461C40.3469 65.2461 41.5621 65.7722 42.5466 66.8276C43.5311 67.883 44.0367 69.2752 44.0633 71.0075V71.8961ZM37.5974 68.5182C37.1983 68.8229 36.9263 69.24 36.7785 69.7757H40.9116C40.7638 69.2111 40.5125 68.7876 40.1518 68.4989C39.7911 68.2102 39.3743 68.0659 38.8953 68.0659C38.4282 68.0626 37.9965 68.2166 37.5974 68.5182Z" fill="#4E626D"/>
                                <path d="M64.6792 76.4447H61.1462L58.9111 67.4786L56.6553 76.4447H53.143L49.332 61.9353H52.7054L55.041 71.0747L57.3353 61.9353H60.4691L62.7663 71.0747L65.102 61.9353H68.496L64.6792 76.4447Z" fill="#4E626D"/>
                                <path d="M79.4053 76.4449H76.2122V75.5788C75.3992 76.3744 74.3615 76.7689 73.0991 76.7689C71.742 76.7689 70.586 76.23 69.634 75.1554C68.6821 74.0807 68.2061 72.6981 68.2061 71.0075C68.2061 69.333 68.6821 67.9536 69.634 66.8693C70.586 65.785 71.7391 65.2461 73.0991 65.2461C74.3615 65.2461 75.3992 65.6439 76.2122 66.4362V65.5701H79.4053V76.4449ZM75.4849 73.0349C75.9698 72.5088 76.2152 71.832 76.2152 71.0107C76.2152 70.2023 75.9728 69.5319 75.4849 68.9962C75.0001 68.4604 74.4236 68.1942 73.7584 68.1942C73.0518 68.1942 72.4752 68.4572 72.0229 68.9833C71.5705 69.5094 71.3429 70.1863 71.3429 71.0075C71.3429 71.8448 71.5676 72.5249 72.0229 73.0445C72.4752 73.5642 73.0547 73.8241 73.7584 73.8241C74.4236 73.8241 74.9971 73.561 75.4849 73.0349Z" fill="#4E626D"/>
                                <path d="M89.1443 75.9704C88.2249 76.5029 87.3143 76.7724 86.4096 76.7724C85.1442 76.7724 84.1626 76.4035 83.4649 75.6689C82.7672 74.9343 82.4183 73.8564 82.4183 72.4417V68.326H80.603V65.5768H82.4183V62.3721H85.6113V65.5768H88.5649V68.326H85.6113V72.0953C85.6113 73.1507 86.0578 73.6768 86.9477 73.6768C87.4532 73.6768 87.9381 73.5324 88.4052 73.2437L89.1443 75.9704Z" fill="#4E626D"/>
                                <path d="M99.9798 71.8961H92.6358C92.7689 72.5473 93.029 73.0574 93.4134 73.4327C93.7977 73.808 94.259 73.9941 94.7911 73.9941C95.7875 73.9941 96.5 73.5771 96.9257 72.7398L99.761 73.3685C99.3353 74.4945 98.6937 75.3414 97.8363 75.9124C96.9789 76.4834 95.9619 76.7689 94.7911 76.7689C93.3129 76.7689 92.0623 76.23 91.0393 75.1554C90.0164 74.0807 89.502 72.6981 89.502 71.0075C89.502 69.333 90.0134 67.9536 91.0393 66.8693C92.0652 65.785 93.3217 65.2461 94.8118 65.2461C96.2634 65.2461 97.4786 65.7722 98.4631 66.8276C99.4476 67.883 99.9532 69.2752 99.9798 71.0075V71.8961ZM93.5139 68.5182C93.1148 68.8229 92.8428 69.24 92.695 69.7757H96.8281C96.6803 69.2111 96.429 68.7876 96.0713 68.4989C95.7135 68.2102 95.2908 68.0659 94.8148 68.0659C94.3447 68.0626 93.913 68.2166 93.5139 68.5182Z" fill="#4E626D"/>
                                <path d="M109 65.509L108.861 68.9735H108.282C105.979 68.9735 104.829 70.3305 104.829 73.0444V76.4448H101.636V65.5731H104.829V67.6519C105.654 66.1634 106.804 65.4224 108.282 65.4224C108.545 65.4224 108.788 65.4512 109 65.509Z" fill="#4E626D"/>
                                <path d="M20.6309 92.321V82.5881H22.0648V92.321H20.6309Z" fill="#4E626D"/>
                                <path d="M29.8015 85.7605C30.2922 86.3283 30.5376 87.0597 30.5376 87.9612V92.3207H29.1303V88.2659C29.1303 87.6757 28.9855 87.2009 28.6957 86.8416C28.406 86.4823 28.0246 86.3027 27.5516 86.3027C26.9366 86.3027 26.4518 86.5304 26.0999 86.986C25.7481 87.4415 25.5707 88.1087 25.5707 88.9909V92.3175H24.1782V85.1125H25.5707V85.9979C26.1325 85.2697 26.9012 84.9072 27.8738 84.9072C28.6662 84.9104 29.3107 85.1927 29.8015 85.7605Z" fill="#4E626D"/>
                                <path d="M38.1032 85.7605C38.594 86.3283 38.8394 87.0597 38.8394 87.9612V92.3207H37.4321V88.2659C37.4321 87.6757 37.2872 87.2009 36.9975 86.8416C36.7078 86.4823 36.3264 86.3027 35.8533 86.3027C35.2384 86.3027 34.7535 86.5304 34.4017 86.986C34.0499 87.4415 33.8725 88.1087 33.8725 88.9909V92.3175H32.48V85.1125H33.8725V85.9979C34.4342 85.2697 35.2029 84.9072 36.1756 84.9072C36.9709 84.9104 37.6125 85.1927 38.1032 85.7605Z" fill="#4E626D"/>
                                <path d="M46.3048 86.0075C46.9878 86.7101 47.3278 87.6147 47.3278 88.7182C47.3278 89.8217 46.9848 90.7264 46.2959 91.4353C45.6071 92.1411 44.7704 92.4971 43.78 92.4971C42.7807 92.4971 41.9351 92.1443 41.2433 91.4353C40.5515 90.7264 40.2056 89.8217 40.2056 88.7182C40.2056 87.6147 40.5515 86.7101 41.2433 86.0075C41.9351 85.305 42.7807 84.9553 43.78 84.9553C44.7793 84.9553 45.6219 85.305 46.3048 86.0075ZM45.3203 90.4954C45.7579 90.0367 45.9766 89.4432 45.9766 88.715C45.9766 87.9868 45.7579 87.3933 45.3203 86.9346C44.8827 86.4759 44.3713 86.2449 43.78 86.2449C43.1739 86.2449 42.6535 86.4759 42.2189 86.9346C41.7873 87.3933 41.5685 87.9868 41.5685 88.715C41.5685 89.44 41.7843 90.0335 42.2189 90.4954C42.6535 90.9573 43.1709 91.1851 43.78 91.1851C44.3713 91.1851 44.8827 90.9573 45.3203 90.4954Z" fill="#4E626D"/>
                                <path d="M52.1502 92.3209H50.6631L47.8101 85.0999H49.3238L51.4111 90.518L53.4983 85.0999H55.0121L52.1502 92.3209Z" fill="#4E626D"/>
                                <path d="M62.5424 92.3207H61.1498V91.493C60.5438 92.1827 59.7396 92.526 58.7403 92.526C57.8386 92.526 57.064 92.1699 56.4165 91.4578C55.769 90.7456 55.4468 89.8313 55.4468 88.7182C55.4468 87.6147 55.772 86.7036 56.4254 85.985C57.0758 85.2665 57.8474 84.9104 58.7403 84.9104C59.7396 84.9104 60.5438 85.2536 61.1498 85.9434V85.1157H62.5424V92.3207ZM60.4935 90.4954C60.9311 90.0367 61.1498 89.4432 61.1498 88.715C61.1498 87.9868 60.9311 87.3933 60.4935 86.9346C60.0559 86.4759 59.5474 86.2449 58.968 86.2449C58.3441 86.2449 57.8267 86.4694 57.4158 86.9186C57.0048 87.3709 56.8008 87.9675 56.8008 88.7118C56.8008 89.456 57.0078 90.0559 57.4158 90.505C57.8267 90.9541 58.3441 91.1819 58.968 91.1819C59.5474 91.1851 60.0559 90.9573 60.4935 90.4954Z" fill="#4E626D"/>
                                <path d="M69.0755 91.9714C68.5049 92.3403 67.955 92.5231 67.4288 92.5231C66.6867 92.5231 66.1042 92.2986 65.6756 91.8495C65.2469 91.3971 65.034 90.7363 65.034 89.867V86.3671H63.6001V85.1193H65.034V82.8801H66.4265V85.1193H68.703V86.3671H66.4265V89.7675C66.4265 90.2038 66.5241 90.5342 66.7222 90.762C66.9202 90.9897 67.1863 91.102 67.5263 91.102C67.9107 91.102 68.2861 90.9705 68.6498 90.7107L69.0755 91.9714Z" fill="#4E626D"/>
                                <path d="M71.633 82.28C71.8045 82.4629 71.8873 82.6874 71.8873 82.9473C71.8873 83.2199 71.8045 83.4413 71.6389 83.6145C71.4733 83.7877 71.2605 83.8776 71.0033 83.8776C70.7431 83.8776 70.5302 83.791 70.3588 83.6145C70.1902 83.4413 70.1045 83.2167 70.1045 82.9473C70.1045 82.6842 70.1902 82.4629 70.3588 82.28C70.5273 82.0972 70.7431 82.0042 71.0033 82.0042C71.2546 82.0042 71.4645 82.0972 71.633 82.28ZM70.3085 92.3208V85.1158H71.701V92.3208H70.3085Z" fill="#4E626D"/>
                                <path d="M79.4328 86.0075C80.1157 86.7101 80.4557 87.6147 80.4557 88.7182C80.4557 89.8217 80.1128 90.7264 79.4239 91.4353C78.735 92.1411 77.8983 92.4971 76.905 92.4971C75.9057 92.4971 75.0601 92.1443 74.3683 91.4353C73.6765 90.7264 73.3306 89.8217 73.3306 88.7182C73.3306 87.6147 73.6765 86.7101 74.3683 86.0075C75.0601 85.305 75.9057 84.9553 76.905 84.9553C77.9072 84.9553 78.7498 85.305 79.4328 86.0075ZM78.4483 90.4954C78.8858 90.0367 79.1046 89.4432 79.1046 88.715C79.1046 87.9868 78.8858 87.3933 78.4483 86.9346C78.0107 86.4759 77.4992 86.2449 76.9079 86.2449C76.3018 86.2449 75.7815 86.4759 75.3469 86.9346C74.9123 87.3933 74.6965 87.9868 74.6965 88.715C74.6965 89.44 74.9123 90.0335 75.3469 90.4954C75.7785 90.9573 76.2989 91.1851 76.9079 91.1851C77.4992 91.1851 78.0107 90.9573 78.4483 90.4954Z" fill="#4E626D"/>
                                <path d="M87.634 85.7605C88.1248 86.3283 88.3702 87.0597 88.3702 87.9612V92.3207H86.9658V88.2659C86.9658 87.6757 86.821 87.2009 86.5312 86.8416C86.2415 86.4823 85.8601 86.3027 85.3871 86.3027C84.7692 86.3027 84.2872 86.5304 83.9325 86.986C83.5777 87.4415 83.4033 88.1087 83.4033 88.9909V92.3175H82.0107V85.1125H83.4033V85.9979C83.965 85.2697 84.7337 84.9072 85.7064 84.9072C86.5017 84.9104 87.1432 85.1927 87.634 85.7605Z" fill="#4E626D"/>
                                <path d="M109 86.6492H94.188V87.8785H109V86.6492Z" fill="#29BBEE"/>
                                <path d="M14.812 86.6492H0V87.8785H14.812V86.6492Z" fill="#29BBEE"/>
                            </svg>
                        </div>
                    </div>
                </a>
            </div>
        </section>


        <section class="company--information--wrapper">
            <div class="company--information--header--texts">
                <h2 class="signIn--signUp--header">Company Information</h2>
                <p class="nr--common--peraText">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            </div>

            <div class="from--main--wrapper">
                <form action="#">
                    <div class="company--info--form--wrapper">
                    
                        <div class="nr--company--input--main">
                            <label for="compantName"><span class="input--lebel--text">Company Name *</span></label>
                            <div class="nr--comapny--name--input">
                                <input type="text" id="compantName" name="compantName" placeholder="Enter Your Company Name">
                            </div>
                        </div>
                        <!-- company Namme in upper -->
    
                        <div class="nr--names--input--main--wrapper">
                            <div class="nr--names--input--main">
                                <label for="companyFirstName"><span class="input--lebel--text">First Name *</span></label>
                                <div class="nr--first--name--input">
                                    <input type="text" id="companyFirstName" name="companyFirstName" placeholder="Enter Your First Name">
                                </div>
                            </div>
    
                            <div class="nr--names--input--main">
                                <label for="companySecondName"><span class="input--lebel--text">Last Name *</span></label>
                                <div class="nr--first--name--input">
                                    <input type="text" id="companySecondName" name="companySecondName" placeholder="Enter Your Last Name">
                                </div>
                            </div>
                        </div>
                        <!-- first and second Name in upper -->
                         
                        <div class="nr--names--input--main--wrapper">
                            <div class="nr--names--input--main">
                                <label for="companyEmail"><span class="input--lebel--text">Email Address *</span></label>
                                <div class="nr--first--name--input">
                                    <input type="email" id="companyEmail" name="companyEmail" placeholder="Enter Your Email Address">
                                </div>
                            </div>
    
                            <div class="nr--names--input--main">
                                <label for="companySecondName"><span class="input--lebel--text">Phone Number *</span></label>
                                <div class="nr--first--name--input">
                                    <input type="number" id="companySecondName" name="companySecondName" placeholder="Enter Your Phone Number">
                                </div>
                            </div>
                        </div>
                        <!-- number and email in upper -->
    
                        <div class="nr--company--input--main">
                            <label for="companyVatId"><span class="input--lebel--text">VAT ID Number</span></label>
                            <div class="nr--comapny--name--input">
                                <input type="number" id="companyVatId" name="companyVatId" placeholder="Enter Your VAT ID Number">
                            </div>
                        </div>
                        <!-- Vat number in upper -->
    
                        <div class="nr--names--input--main--wrapper">
                            <div class="nr--names--input--main">
                                <label for="companyCity"><span class="input--lebel--text">City *</span></label>
                                <div class="nr--first--name--input">
                                    <input type="text" id="companyCity" name="companyCity" placeholder="Enter Your City">
                                </div>
                            </div>
    
                            <div class="nr--names--input--main">
                                <label for="companyPostalCode"><span class="input--lebel--text">Postal Code *</span></label>
                                <div class="nr--first--name--input">
                                    <input type="number" id="companyPostalCode" name="companyPostalCode" placeholder="Enter Your Phone Number">
                                </div>
                            </div>
                        </div>
                        <!-- city and postal code in upper -->
    
                        <div class="nr--company--input--main">
                            <label for="companyHouseAddrrss"><span class="input--lebel--text">House Address *</span></label>
                            <div class="nr--comapny--name--input">
                                <input type="text" id="companyHouseAddrrss" name="companyHouseAddrrss" placeholder="Enter Your House Address">
                            </div>
                        </div>
                        <!-- House Address in upper -->
    
                        <div class="nr--company--input--main">
                            <label for="companyinstraction"><span class="input--lebel--text">Special Instructions for Delivery</span></label>
                            <div class="nr--comapny--name--input">
                                <textarea placeholder="Write Here..." name="companyinstraction" id="companyinstraction"></textarea>
                            </div>
                        </div>
                        <!-- Instraction in upper -->
                    </div>
                    <div class="company--submit--btn">
                        <button class="loginSubmit--btn">Submit</button>
                    </div>

                </form>
            </div>
            


            <div class="company--information--freameOne">
                <img src="frontend/images/companyNameFreameOne.png" alt="not found">
            </div>
            <div class="company--information--freameTwo">
                <img src="frontend/images/companyFreameTwo.png" alt="not found">
            </div>
        </section>
@endsection
    <!-- ===================== company information Page End Hare ============================= -->