import unittest

from selenium import webdriver
from test_utility import fields, static_data


class InternalTransactions(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_int_trans_rial_fail(self):  # Assume Money < Needed
        driver = self.driver
        driver.get(static_data.base_url + "user/profile/int-trans")
        fields.get_components_by_name(driver, ["payee-id=1111222233334444", "price=1000", "type=rial",
                                               "submit"])[3].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_int_trans_dollar_fail(self):    # Assume Money < Needed
        driver = self.driver
        driver.get(static_data.base_url + "user/profile/int-trans")
        fields.get_components_by_name(driver, ["payee-id=1111222233334444", "price=1000", "type=dollar",
                                               "submit"])[3].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_int_trans_euro_fail(self):  # Assume Money < Needed
        driver = self.driver
        driver.get(static_data.base_url + "user/profile/int-trans")
        fields.get_components_by_name(driver, ["payee-id=1111222233334444", "price=1000", "type=euro",
                                               "submit"])[3].click()

        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()
