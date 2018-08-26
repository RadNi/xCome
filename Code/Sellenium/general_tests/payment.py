import unittest
from time import sleep

from selenium import webdriver
from test_utility import fields, static_data


class Payment(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()
        self.driver.get(static_data.base_url + "login")
        fields.get_components_by_name(self.driver, ["username=user", "password=testtest",
                                                    "submit"])[2].click()
        self.driver.get(static_data.base_url + "/profile/int-trans")

    def test_pay_rial(self):  # Assume Money > Needed
        sleep(2)
        self.driver.find_element_by_id("Curr_Type").send_keys("Rial")
        sleep(2)
        fields.get_components_by_name(self.driver, ["payee-id=" + static_data.valid_rial_wallet_address,
                                                    "price=10", "submit"])[2].click()
        sleep(5)
        assert "successful" in self.driver.find_element_by_tag_name("body").text

    def test_pay_dollar(self):  # Assume Money > Needed
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        fields.get_components_by_name(driver, ["payee-id=1111222233334444", "price=1000", "type=dollar",
                                               "submit"])[3].click()

        assert driver.find_element_by_id("successful") is not None

    def test_pay_euro(self):  # Assume Money > Needed
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        fields.get_components_by_name(driver, ["payee-id=1111222233334444", "price=1000", "type=euro",
                                               "submit"])[3].click()

        assert driver.find_element_by_id("successful") is not None

    def test_pay_rial_fail(self):  # Assume Money < Needed
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        fields.get_components_by_name(driver, ["payee-id=1111222233334444", "price=1000", "type=rial",
                                               "submit"])[3].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_pay_dollar_fail(self):  # Assume Money < Needed
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        fields.get_components_by_name(driver, ["payee-id=1111222233334444", "price=1000", "type=dollar",
                                               "submit"])[3].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_pay_euro_fail(self):  # Assume Money < Needed
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        fields.get_components_by_name(driver, ["payee-id=1111222233334444", "price=1000", "type=euro",
                                               "submit"])[3].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_pay_empty_payee(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        fields.get_components_by_name(driver, ["price=1000", "type=rial",
                                               "submit"])[2].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_pay_empty_price(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        fields.get_components_by_name(driver, ["payee-id=1111222233334444", "type=rial",
                                               "submit"])[2].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_pay_empty_type(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        fields.get_components_by_name(driver, ["payee-id=1111222233334444", "price=1000",
                                               "submit"])[2].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_pay_invalid_type(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        fields.get_components_by_name(driver, ["payee-id=1111222233334444", "price=1000", "type=unknown",
                                               "submit"])[3].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_pay_card_short_length(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        fields.get_components_by_name(driver, ["payee-id=11112444", "price=1000", "type=unknown",
                                               "submit"])[3].click()
        assert driver.find_element_by_id("inValid") is not None

    def test_pay_card_long_length(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        fields.get_components_by_name(driver, ["payee-id=111134345222233334444", "price=1000", "type=unknown",
                                               "submit"])[3].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_pay_card_format(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        fields.get_components_by_name(driver, ["payee-id=11sdfsdf334444ss", "price=1000", "type=unknown",
                                               "submit"])[3].click()
        assert driver.find_element_by_id("inValid") is not None

    def test_pay_price_format(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        fields.get_components_by_name(driver, ["payee-id=1111222233334444", "price=10s00", "type=unknown",
                                               "submit"])[3].click()
        assert driver.find_element_by_id("inValid") is not None

    def test_pay_price_too_much(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        fields.get_components_by_name(driver, ["payee-id=1111222233334444", "price=10000000000", "type=unknown",
                                               "submit"])[3].click()
        assert driver.find_element_by_id("inValid") is not None

    def test_pay_too_low(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        fields.get_components_by_name(driver, ["payee-id=1111222233334444", "price=2", "type=unknown",
                                               "submit"])[3].click()
        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()
