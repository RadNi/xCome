import unittest

from selenium import webdriver
from test_utility import static_data, fields


class InternalTransactions(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_int_trans_invalid_type(self):
        driver = self.driver
        driver.get(static_data.base_url + "user/profile/int-trans")
        fields.get_components_by_name(driver, ["payee-id=1111222233334444", "price=1000", "type=unknown",
                                               "submit"])[3].click()

        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()
