import unittest

from selenium import webdriver

from test_utility import static_data


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

    def test_wallet_exchange_buy(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        driver.find_element_by_id("wallets-table").find_elements_by_class_name("wallet")[2].\
            find_element_by_class_name("diagram").click()
        inputs = driver.find_element_by_id("walletInfo").find_elements_by_tag_name("input")
        inputs[0].send_keys("100")
        inputs[1].click()
        assert driver.find_element_by_id("successful") is not None

    def test_wallet_exchange_sell(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        driver.find_element_by_id("wallets-table").find_elements_by_class_name("wallet")[2].\
            find_element_by_class_name("diagram").click()
        inputs = driver.find_element_by_id("walletInfo").find_elements_by_tag_name("input")
        inputs[2].send_keys("100")
        inputs[3].click()
        assert driver.find_element_by_id("successful") is not None

    def test_wallet_exchange_buy_too_much(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        driver.find_element_by_id("wallets-table").find_elements_by_class_name("wallet")[2].\
            find_element_by_class_name("diagram").click()
        inputs = driver.find_element_by_id("walletInfo").find_elements_by_tag_name("input")
        inputs[0].send_keys("100000000000")
        inputs[1].click()
        assert driver.find_element_by_id("inValid") is not None

    def test_wallet_exchange_sell_too_much(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        driver.find_element_by_id("wallets-table").find_elements_by_class_name("wallet")[2].\
            find_element_by_class_name("diagram").click()
        inputs = driver.find_element_by_id("walletInfo").find_elements_by_tag_name("input")
        inputs[2].send_keys("1000000000000")
        inputs[3].click()
        assert driver.find_element_by_id("inValid") is not None

    def test_wallet_exchange_buy_format(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        driver.find_element_by_id("wallets-table").find_elements_by_class_name("wallet")[2].\
            find_element_by_class_name("diagram").click()
        inputs = driver.find_element_by_id("walletInfo").find_elements_by_tag_name("input")
        inputs[0].send_keys("a")
        inputs[1].click()
        assert driver.find_element_by_id("inValid") is not None

    def test_wallet_exchange_sell_format(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        driver.find_element_by_id("wallets-table").find_elements_by_class_name("wallet")[2].\
            find_element_by_class_name("diagram").click()
        inputs = driver.find_element_by_id("walletInfo").find_elements_by_tag_name("input")
        inputs[2].send_keys("a")
        inputs[3].click()
        assert driver.find_element_by_id("inValid") is not None



    def tearDown(self):
        self.driver.close()
