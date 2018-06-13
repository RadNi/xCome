import unittest

from selenium import webdriver
from test_utility import fields, static_data


class InternalTransactions(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_int_trans_empty_payee(self):
        driver = self.driver
        driver.get(static_data.base_url + "user/profile/int-trans")
        fields.get_components_by_name(driver, ["price=1000", "type=rial",
                                               "submit"])[2].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_int_trans_empty_price(self):
        driver = self.driver
        driver.get(static_data.base_url + "user/profile/int-trans")
        fields.get_components_by_name(driver, ["payee-id=1111222233334444", "type=rial",
                                               "submit"])[2].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_int_trans_empty_type(self):
        driver = self.driver
        driver.get(static_data.base_url + "user/profile/int-trans")
        fields.get_components_by_name(driver, ["payee-id=1111222233334444", "price=1000",
                                               "submit"])[2].click()

        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()
