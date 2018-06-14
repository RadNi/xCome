import unittest

from selenium import webdriver
from test_utility import static_data, fields

# These Test could be also used by foreign payment, retrieve money


class ApplyPayment(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_app_pay_card_short_length(self):
        driver = self.driver
        driver.get(static_data.base_url + "user/profile/apply-pay")
        fields.get_components_by_name(driver, ["payee-id=11113334444", "price=1000", "submit"])[2].click()
        assert driver.find_element_by_id("inValid") is not None

    def test_app_pay_card_long_length(self):
        driver = self.driver
        driver.get(static_data.base_url + "user/profile/apply-pay")
        fields.get_components_by_name(driver, ["payee-id=111122342342233334444", "price=1000", "submit"])[2].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_app_pay_card_format(self):
        driver = self.driver
        driver.get(static_data.base_url + "user/profile/apply-pay")
        fields.get_components_by_name(driver, ["payee-id=1111222ab3334444", "price=1000", "submit"])[2].click()

        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()
