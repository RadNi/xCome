import unittest

from selenium import webdriver
from test_utility import fields, static_data


class Payment(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()
        self.address = "user/profile/ret-mon"

    def test_ret_money(self):  # Assume Money > Needed
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        fields.get_components_by_name(driver, ["payee-id=1111222233334444", "price=1000"
                                               "submit"])[2].click()
        assert driver.find_element_by_id("successful") is not None

    def test_ret_money_fail(self):  # Assume Money < Needed
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        fields.get_components_by_name(driver, ["payee-id=1111222233334444", "price=1000",
                                               "submit"])[2].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_pay_empty_payee(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        fields.get_components_by_name(driver, ["price=1000",
                                               "submit"])[1].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_pay_empty_price(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        fields.get_components_by_name(driver, ["payee-id=1111222233334444",
                                               "submit"])[1].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_pay_card_short_length(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        fields.get_components_by_name(driver, ["payee-id=11112444", "price=1000",
                                               "submit"])[2].click()
        assert driver.find_element_by_id("inValid") is not None

    def test_pay_card_long_length(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        fields.get_components_by_name(driver, ["payee-id=111134345222233334444", "price=1000",
                                               "submit"])[2].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_pay_card_format(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        fields.get_components_by_name(driver, ["payee-id=11sdfsdf334444ss", "price=1000",
                                               "submit"])[2].click()
        assert driver.find_element_by_id("inValid") is not None

    def test_pay_price_format(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        fields.get_components_by_name(driver, ["payee-id=1111222233334444", "price=10s00",
                                               "submit"])[2].click()
        assert driver.find_element_by_id("inValid") is not None

    def test_pay_price_too_much(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        fields.get_components_by_name(driver, ["payee-id=1111222233334444", "price=10000000000",
                                               "submit"])[2].click()
        assert driver.find_element_by_id("inValid") is not None

    def test_pay_too_low(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        fields.get_components_by_name(driver, ["payee-id=1111222233334444", "price=2",
                                               "submit"])[2].click()
        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()
