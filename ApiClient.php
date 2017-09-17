<?php

/**
 * Api client.
 */
class ApiClient {
    /** @var string default market type */
    const DEFAULT_MARKET_TYPE = 'sk';
    /** @var string sk url */
    const SK_URL = 'https://nafakturu.sk/api';
    /** @var string cz url */
    const CZ_URL = 'https://nafakturu.eu/api';
    /** @var string url */
    private $url = '';
    /** @var string key */
    private $key = '';

    /**
     * Api client constructor.
     *
     * @param string $key
     * @param string $market_type
     */
    public function __construct($key = '', $market_type = self::DEFAULT_MARKET_TYPE) {
        $this->url = $market_type == 'sk' ? self::SK_URL : self::CZ_URL;
        $this->key = $key;
    }

    /**
     * Call api endpoint.
     *
     * @param string $method
     * @param string $action
     * @param array $data
     *
     * @return array response data
     */
    public function call($method = '', $action = '', $data = []) {
        $c = curl_init();

        curl_setopt($c, CURLOPT_URL, $this->url . $action . '/key:' . $this->key);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_HTTPHEADER, []);
        curl_setopt($c, CURLOPT_TIMEOUT, 30);

        if ($method == 'post') {
            curl_setopt($c, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($c, CURLOPT_FOLLOWLOCATION, 1);
        }

        $response = curl_exec($c);

        curl_close($c);

        var_dump($response);exit;
    }

    /**
     * Save address book.
     *
     * @param array $data
     *
     * @return array response data
     */
    public function saveAddressBook($data = []) {
        return $this->call('post', '/address_book', $data);
    }

    /**
     * Delete address book.
     *
     * @param int $id
     *
     * @return array response data
     */
    public function deleteAddressBook($id = 0) {
        return $this->call('get', '/address_book/delete/' . $id);
    }

    /**
     * Save bank account.
     *
     * @param array $data
     *
     * @return array response data
     */
    public function saveBankAccount($data = []) {
        return $this->call('post', '/bank_account', $data);
    }

    /**
     * Delete bank account.
     *
     * @param int $id
     *
     * @return array response data
     */
    public function deleteBankAccount($id = 0) {
        return $this->call('get', '/bank_account/delete/' . $id);
    }

    /**
     * Save bank account log.
     *
     * @param array $data
     *
     * @return array response data
     */
    public function saveBankAccountLog($data = []) {
        return $this->call('post', '/bank_account_log', $data);
    }

    /**
     * Delete bank account log.
     *
     * @param int $id
     *
     * @return array response data
     */
    public function deleteBankAccountLog($id = 0) {
        return $this->call('get', '/bank_account_log/delete/' . $id);
    }

    /**
     * Save car.
     *
     * @param array $data
     *
     * @return array response data
     */
    public function saveCar($data = []) {
        return $this->call('post', '/car', $data);
    }

    /**
     * Delete car.
     *
     * @param int $id
     *
     * @return array response data
     */
    public function deleteCar($id = 0) {
        return $this->call('get', '/car/delete/' . $id);
    }

    /**
     * Save car ride.
     *
     * @param array $data
     *
     * @return array response data
     */
    public function saveCarRide($data = []) {
        return $this->call('post', '/car_ride', $data);
    }

    /**
     * Delete car ride.
     *
     * @param int $id
     *
     * @return array response data
     */
    public function deleteCarRide($id = 0) {
        return $this->call('get', '/car_ride/delete/' . $id);
    }

    /**
     * Save car fueling.
     *
     * @param array $data
     *
     * @return array response data
     */
    public function saveCarFueling($data = []) {
        return $this->call('post', '/car_fueling', $data);
    }

    /**
     * Delete car fueling.
     *
     * @param int $id
     *
     * @return array response data
     */
    public function deleteCarFueling($id = 0) {
        return $this->call('get', '/car_fueling/delete/' . $id);
    }

    /**
     * Save client.
     *
     * @param array $data
     *
     * @return array response data
     */
    public function saveClient($data = []) {
        return $this->call('post', '/client', $data);
    }

    /**
     * Delete client.
     *
     * @param int $id
     *
     * @return array response data
     */
    public function deleteClient($id = 0) {
        return $this->call('get', '/client/delete/' . $id);
    }

    /**
     * Save invoice.
     *
     * @param array $data
     * @param array $items
     *
     * @return array response data
     */
    public function saveInvoice($data = [], $items = []) {
        return $this->call('post', '/invoice', array_merge($data, ['items' => $items]));
    }

    /**
     * Delete invoice.
     *
     * @param int $id
     *
     * @return array response data
     */
    public function deleteInvoice($id = 0) {
        return $this->call('get', '/invoice/delete/' . $id);
    }

    /**
     * Add invoice email.
     *
     * @param array $data
     *
     * @return array response data
     */
    public function addInvoiceEmail($data = []) {
        return $this->call('post', '/invoice_email', $data);
    }

    /**
     * Add invoice payment.
     *
     * @param array $data
     *
     * @return array response data
     */
    public function addInvoicePayment($data = []) {
        return $this->call('post', '/invoice_payment', $data);
    }

    /**
     * Delete invoice payment.
     *
     * @param int $id
     *
     * @return array response data
     */
    public function deleteInvoicePayment($id = 0) {
        return $this->call('get', '/invoice_payment/delete/' . $id);
    }

    /**
     * Save notice.
     *
     * @param array $data
     *
     * @return array response data
     */
    public function saveNotice($data = []) {
        return $this->call('post', '/notice', $data);
    }

    /**
     * Delete notice.
     *
     * @param int $id
     *
     * @return array response data
     */
    public function deleteNotice($id = 0) {
        return $this->call('get', '/notice/delete/' . $id);
    }

    /**
     * Save register.
     *
     * @param array $data
     *
     * @return array response data
     */
    public function saveRegister($data = []) {
        return $this->call('post', '/register', $data);
    }

    /**
     * Delete register.
     *
     * @param int $id
     *
     * @return array response data
     */
    public function deleteRegister($id = 0) {
        return $this->call('get', '/register/delete/' . $id);
    }

    /**
     * Save register log.
     *
     * @param array $data
     *
     * @return array response data
     */
    public function saveRegisterLog($data = []) {
        return $this->call('post', '/register_log', $data);
    }

    /**
     * Delete register log.
     *
     * @param int $id
     *
     * @return array response data
     */
    public function deleteRegisterLog($id = 0) {
        return $this->call('get', '/register_log/delete/' . $id);
    }

    /**
     * Get sequences.
     *
     * @return array response data
     */
    public function getSequences() {
        return $this->call('get', '/sequence/get');
    }

    /**
     * Save sequence.
     *
     * @param array $data
     *
     * @return array response data
     */
    public function saveSequence($data = []) {
        return $this->call('post', '/sequence', $data);
    }

    /**
     * Delete sequence.
     *
     * @param int $id
     *
     * @return array response data
     */
    public function deleteSequence($id = 0) {
        return $this->call('get', '/sequence/delete/' . $id);
    }

    /**
     * Save storage.
     *
     * @param array $data
     *
     * @return array response data
     */
    public function saveStorage($data = []) {
        return $this->call('post', '/storage', $data);
    }

    /**
     * Delete storage.
     *
     * @param int $id
     *
     * @return array response data
     */
    public function deleteStorage($id = 0) {
        return $this->call('get', '/storage/delete/' . $id);
    }

    /**
     * Save storage group.
     *
     * @param array $data
     *
     * @return array response data
     */
    public function saveStorageGroup($data = []) {
        return $this->call('post', '/storage_group', $data);
    }

    /**
     * Delete storage group.
     *
     * @param int $id
     *
     * @return array response data
     */
    public function deleteStorageGroup($id = 0) {
        return $this->call('get', '/storage_group/delete/' . $id);
    }

    /**
     * Save storage control.
     *
     * @param array $data
     *
     * @return array response data
     */
    public function saveStorageControl($data = []) {
        return $this->call('post', '/storage_control', $data);
    }

    /**
     * Close storage control.
     *
     * @param int $id
     *
     * @return array response data
     */
    public function closeStorageControl($id = 0) {
        return $this->call('get', '/storage_control/close/' . $id);
    }

    /**
     * Delete storage control.
     *
     * @param int $id
     *
     * @return array response data
     */
    public function deleteStorageControl($id = 0) {
        return $this->call('get', '/storage_control/delete/' . $id);
    }

    /**
     * Save storage item.
     *
     * @param array $data
     *
     * @return array response data
     */
    public function saveStorageItem($data = []) {
        return $this->call('post', '/storage_item', $data);
    }

    /**
     * Delete storage item.
     *
     * @param int $id
     *
     * @return array response data
     */
    public function deleteStorageItem($id = 0) {
        return $this->call('get', '/storage_item/delete/' . $id);
    }

    /**
     * Save storage control item.
     *
     * @param array $data
     *
     * @return array response data
     */
    public function saveStorageControlItem($data = []) {
        return $this->call('post', '/storage_control_item', $data);
    }

    /**
     * Delete storage control item.
     *
     * @param int $id
     *
     * @return array response data
     */
    public function deleteStorageControlItem($id = 0) {
        return $this->call('get', '/storage_control_item/delete/' . $id);
    }

    /**
     * Save template.
     *
     * @param array $data
     *
     * @return array response data
     */
    public function saveTemplate($data = []) {
        return $this->call('post', '/template', $data);
    }

    /**
     * Delete template.
     *
     * @param int $id
     *
     * @return array response data
     */
    public function deleteTemplate($id = 0) {
        return $this->call('get', '/template/delete/' . $id);
    }
}