import unittest
from time import sleep

from selenium import webdriver

from test_utility import static_data
from test_utility import fields


class Wallet(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()
        self.driver.get(static_data.base_url + "login")
        fields.get_components_by_name(self.driver, ["username=smjfas", "password=smjfas",
                                                    "submit"])[2].click()

    def test_wallet_exchange_buy(self):
        trs = self.driver.find_element_by_tag_name('tbody').find_elements_by_tag_name('tr')
        for i in range(0, len(trs)):
            if trs[i].find_elements_by_tag_name('td')[0].text == "dollar":
                desired_row = i
                break
        before = trs[desired_row].find_elements_by_tag_name('td')[1].text
        trs[desired_row].find_elements_by_tag_name('td')[3].find_element_by_id("dollar").send_keys("10")
        trs[desired_row].find_elements_by_tag_name('td')[3].find_element_by_id("buydollar").click()
        self.driver.get(static_data.base_url + "/profile")
        trs = self.driver.find_element_by_tag_name('tbody').find_elements_by_tag_name('tr')
        after = trs[desired_row].find_elements_by_tag_name('td')[1].text
        assert (int(after) - int(before)) is 10

    def test_wallet_exchange_sell(self):
        trs = self.driver.find_element_by_tag_name('tbody').find_elements_by_tag_name('tr')
        for i in range(0, len(trs)):
            if trs[i].find_elements_by_tag_name('td')[0].text == "dollar":
                desired_row = i
                break
        before = trs[desired_row].find_elements_by_tag_name('td')[1].text
        trs[desired_row].find_elements_by_tag_name('td')[3].find_element_by_id("dollar").send_keys("10")
        trs[desired_row].find_elements_by_tag_name('td')[3].find_element_by_id("selldollar").click()
        self.driver.get(static_data.base_url + "/profile")
        trs = self.driver.find_element_by_tag_name('tbody').find_elements_by_tag_name('tr')
        after = trs[desired_row].find_elements_by_tag_name('td')[1].text
        assert (int(before) - int(after)) is 10

    def test_wallet_exchange_buy_too_much(self):
        trs = self.driver.find_element_by_tag_name('tbody').find_elements_by_tag_name('tr')
        for i in range(0, len(trs)):
            if trs[i].find_elements_by_tag_name('td')[0].text == "dollar":
                desired_row = i
                break
        before = trs[desired_row].find_elements_by_tag_name('td')[1].text
        trs[desired_row].find_elements_by_tag_name('td')[3].find_element_by_id("dollar").send_keys("10000000000000000")
        trs[desired_row].find_elements_by_tag_name('td')[3].find_element_by_id("buydollar").click()
        self.driver.get(static_data.base_url + "/profile")
        trs = self.driver.find_element_by_tag_name('tbody').find_elements_by_tag_name('tr')
        after = trs[desired_row].find_elements_by_tag_name('td')[1].text
        assert (int(after) - int(before)) is 0

    def test_wallet_exchange_sell_too_much(self):
        trs = self.driver.find_element_by_tag_name('tbody').find_elements_by_tag_name('tr')
        for i in range(0, len(trs)):
            if trs[i].find_elements_by_tag_name('td')[0].text == "dollar":
                desired_row = i
                break
        before = trs[desired_row].find_elements_by_tag_name('td')[1].text
        trs[desired_row].find_elements_by_tag_name('td')[3].find_element_by_id("dollar").send_keys("10000000000000000")
        trs[desired_row].find_elements_by_tag_name('td')[3].find_element_by_id("selldollar").click()
        self.driver.get(static_data.base_url + "/profile")
        trs = self.driver.find_element_by_tag_name('tbody').find_elements_by_tag_name('tr')
        after = trs[desired_row].find_elements_by_tag_name('td')[1].text
        assert (int(after) - int(before)) is 0

    def tearDown(self):
        self.driver.close()
