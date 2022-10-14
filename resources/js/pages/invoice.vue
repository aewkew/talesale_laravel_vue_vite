<template>
    <div class="container">
        <!-- Hedeline -->

        <div class="row">
            <div class="col">
                <div class="exprint">
                    <button type="button" class="btn but-co">
                        <i class="bi bi-printer"></i> Print
                    </button>
                    <button type="button" class="btn but-co">
                        <i class="bi bi-file-earmark-pdf"></i>Export
                    </button>
                </div>
            </div>
            <div class="col">
                <div class="invoice-title">
                    <h2>Invoice</h2>
                    <h3 class="pull-right">Order # 12345</h3>
                </div>
            </div>
        </div>

        <hr />

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
                            <div class="row">
                                <div class="bill-name">BILL TO</div>
                            </div>
                            <div class="col">
                                <div class="bill-data">
                                    Tiger kung <br />
                                    Jungti kung Comp <br />
                                    Sansai Chaingmai 50210 <br />
                                    06-46166415 , Jungti_ger_kung@hitmill.com
                                </div>
                            </div>

                            <div class="col">
                                <div class="data-invoice">
                                    Invoice Date : 10/14/2022 <br />
                                    Terms : Due on Receipt <br />
                                    Due Date : 10/05/2016
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="table-invoice">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Item</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Unit</th>
                                    <th scope="col">Cost</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Cannon Yellow</td>
                                    <td>Ink Cannon Yellow</td>
                                    <td>2</td>
                                    <td>120</td>
                                    <td>240</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Cannon Black</td>
                                    <td>Ink Cannon Black</td>
                                    <td>2</td>
                                    <td>120</td>
                                    <td>240</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Cannon Blue</td>
                                    <td>Ink Cannon Blue</td>
                                    <td>2</td>
                                    <td>120</td>
                                    <td>240</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8"></div>
                    <div class="col">
                        <div class="total-invoice">
                            <div class="row">
                                <div class="col-7 data-total">Sub Total</div>
                                <div class="col-5"><span>฿ 720</span></div>
                            </div>
                            <div class="row">
                                <div class="col-7 data-sub">Tax(7%)</div>
                                <div class="col-5"><span>฿ 669.6 </span></div>
                            </div>
                            <div class="row sum-total">
                                <div class="col-7 ">Total Amount</div>
                                <div class="col-5">฿ 720</div>
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
