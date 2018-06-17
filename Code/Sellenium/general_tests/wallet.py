import unittest

from selenium import webdriver

from test_utility import static_data, fields


# These Test could be also used by all pages have charge

class Wallet(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()
        self.address = "user/profile"

    def test_wallet_address(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        driver.find_element_by_id("wallets-table").find_elements_by_class_name("wallet")[2].\
            find_element_by_class_name("diagram").click()
        assert driver.find_element_by_id("address").is_displayed()

    def tearDown(self):
        self.driver.close()
