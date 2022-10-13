<template>
    <div class="container">
        <!-- Hedeline -->

        <div class="row exprint">
            <div>
                <button type="button" class="btn but-co">
                    <i class="bi bi-printer"></i> Print
                </button>
                <button type="button" class="btn but-co">
                    <i class="bi bi-file-earmark-pdf"></i>Export
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="invoice-title">
                    <h2>Invoice</h2>
                    <h3 class="pull-right">Order # 12345</h3>
                </div>
            </div>
            <hr />
        </div>

        <!-- Invoice   -->

        <div class="invoice">
            <div class="invoice-data">
                <div class="row">
                    <div class="col">
                        <div class="logo-invoice">
                            <img
                                src="https://seeklogo.com/images/B/Burger_King-logo-67A54F414B-seeklogo.com.png"
                            />
                        </div>
                        <div class="row">
                            <div class="company">
                                Talesale cartridge Company
                            </div>
                            <div class="company-address">
                                2033/02 Rung Arun, <br />
                                HangDong, Chaing Mai 50230<br />
                                ,Thailand <br />
                                084-61061646 ,Talesale_12@hotmille.com<br />
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="invoice-number">
                            <div>INVOICE</div>
                            <div>#INV-002408</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="bill">
                        <div class="row"> 
                        <div class="col">
                            <div class="bill-name">BILL TO</div>
                            <div class="bill-data">
                                Tiger kung <br />
                                Jungti kung Comp <br />
                                Sansai Chaingmai 50210 <br />
                                06-46166415 , Jungti_ger_kung@hitmill.com
                            </div>
                        </div>

                        <div class="col">
                            <div class="data-invoice">
                                Invoice Date :  10/14/2022    <br/>
                                Terms :  Due on Receipt   <br/>
                                Due Date :   10/05/2016 
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "Invoice",
};
</script>
<style></style>
